<?php

namespace App\Helpers;

use App\Helpers\FileHelper;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Exception;

class EmailHelper
{
    /**
     * Send email to one receiver
     *
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     * @param string $blade
     * @param string $subject
     * @param string $sender
     * @param string $receiver
     * @param \Illuminate\Database\Eloquent\Model $data
     * @param string $filename = null
     * @return void
     */
    public static function sendEmail(
        Mailer $mailer,
        string $blade,
        string $subject,
        string $sender,
        string $receiver,
        Model $data,
        string $filename = null
    ) {
        try {
            $mailer->send($blade, ['data'=> $data], function ($message) use ($sender, $receiver, $subject, $filename) {
                $message->from($sender);
                $message->to($receiver);
                $message->subject($subject);
                // Determine if the filename has a value
                if ($filename) {
                    $message->attach(FileHelper::asset($filename));
                }
            });
            // Determine if the filename has a value
            if ($filename) {
                Storage::delete($filename);
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Send email to multiple receivers
     *
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     * @param string $blade
     * @param string $subject
     * @param string $sender
     * @param array $receivers
     * @param \Illuminate\Database\Eloquent\Model $data
     * @param string $filename = null
     * @return void
     */
    public static function sendToManyEmail(
        Mailer $mailer,
        string $blade,
        string $subject,
        string $sender,
        array $receivers,
        Model $data,
        string $filename = null
    ) {
        try {
            // Determine if there is at least 1 receiver
            if (count($receivers) > 0) {
                $mailer->send($blade, ['data'=> $data], function ($message) use ($sender, $receivers, $subject, $filename) {
                    $message->from($sender);
                    $message->to($receivers);
                    $message->subject($subject);
                    // Determine if the filename has a value
                    if ($filename) {
                        $message->attach(FileHelper::asset($filename));
                    }
                });
                // Determine if the filename has a value
                if ($filename) {
                    Storage::delete($filename);
                }
            }
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}