<?php

namespace App\Helpers;

use Image;
use App\Models\ProductImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class FileHelper
{
    public static function saveFile(UploadedFile $file, $id, $path)
    {
        $filename = $file->getClientOriginalName();
        Storage::put($path . '/' . $id . '/' . $filename, \fopen($file, 'r+'), 'public');
        return $path . '/' . $id . '/' . $filename;
    }

    /* This method only applies to image file */

    public static function saveImageWithResize(UploadedFile $file, $id, $path, $size)
    {
        $filename = $file->getClientOriginalName();
        $image = Image::make($file)->fit($size[0], $size[1]);
        Storage::put($path . '/' . $id . '/' . $filename, $image->encode(), 'public');

        return $path . '/' . $id . '/' . $filename;
    }   

    /* This method with resize only applies for models that morph from ProductImage model */

    public static function saveImageWithResizeForProductImageOnly(UploadedFile $file, $id, $img_id, $path, $size, $type)
    {
        try {
            $filename = $file->getClientOriginalName();
            if (count($size) == 1) {
                $image = Image::make($file)->fit($size[0]);
            } else {
                $image = Image::make($file)->fit($size[0], $size[1]);
            }

            Storage::put($path . '/' . $id . '/' . $img_id . '/' . $type . '/' . $filename, $image->encode(), 'public');

            return $path . '/' . $id . '/' . $img_id . '/' . $type . '/' . $filename;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /* This method only applies for models that morph from ProductImage model */

    public static function saveImagesWithDifferentSizes(
        Model $model,
        $path,
        array $files,
        $is_bg,
        $delete_directory = null
    ) {
        try {
            /* delete directory */

            if ($delete_directory) {
                $model->productImages()->delete();
                $directory = $path . '/' . $model->id;
                Storage::deleteDirectory($directory);
            }

            /* store images */

            $sizes = [
                ['size' => $is_bg ? ProductImage::bg_large_size : ProductImage::large_size, 'type' => 'large_image'],
                ['size' => $is_bg ? ProductImage::bg_medium_size : ProductImage::medium_size  , 'type' => 'medium_image'],
                ['size' => $is_bg ? ProductImage::bg_small_size : ProductImage::small_size , 'type' => 'small_image']
            ];

            foreach ($files as $file) {
                $image = $model->productImages()->create([]);
                $images = [];
                $time = ((int) (microtime(true) * 1000));
                foreach ($sizes as $size) {
                    $item = self::saveImageWithResizeForProductImageOnly(
                        $file,
                        $model->id,
                        $image->id,
                        $path,
                        $size['size'],
                        $size['type']
                    );
                    $images[$size['type']] = $item;
                }
                $image->update($images);
            }
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public static function asset($file)
    {
        switch (\Config::get('filesystems.default')) {
            case 's3':
                return \Config::get('filesystems.disks.s3.url') . '/' . $file;
                break;
            case 'public':
                return asset('/storage/' . $file);
                break;
            default:
                return asset($file);
                break;
        }
    }
}