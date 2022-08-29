<?php

namespace App\Services;
use App\Helpers\TransformerHelper;
use App\Transformers\UserTransformer;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class UserServices
{

    public function show($id)
    {
        try {
            $item = resolve('User')->getModel()->find($id);

            return TransformerHelper::item($item, new UserTransformer);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function store($data)
    {
        try {
            
            $user = resolve('User')->store(collect($data)->toArray());
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function storeDoctor($data)
    {
        try {
            
            $user = resolve('User')->store(collect($data)->toArray());
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorEmail()
    {
        try {
            
            $user = resolve('User')->getModel()->where('role', 'doctor')->get();
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientEmail()
    {
        try {
            
            $user = resolve('User')->getModel()->where('role', 'patient')->get();
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function updateUser($data, $id, UploadedFile $image = null)
    {
        try {

            $data['profile'] = url('/') . '/uploads/images/' .$image->getClientOriginalName();
            $image->storeAs('images', $image->getClientOriginalName(), 'public_uploads');

            $user = resolve('User')->update($data, $id);

            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientsUser()
    {
        try {
            $patients = resolve('User')->getModel()
                        ->where('role', 'patient')
                        ->where('id', '!=', Auth::user()->id)
                        ->get();

            return $patients;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorsUser()
    {
        try {
            $patients = resolve('User')->getModel()
                        ->where('role', 'doctor')
                        ->where('id', '!=', Auth::user()->id)
                        ->get();
            
            return $patients;


        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createUser($data)
    {
        try {

            $user = resolve('User')->store(collect($data)->toArray());
            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function updateUsers($data, $id, UploadedFile $image = null)
    {
        try {

            // $data['profile'] = url('/') . '/uploads/images/' .$image->getClientOriginalName();
            // $image->storeAs('images', $image->getClientOriginalName(), 'public_uploads');

            $user = resolve('User')->update($data, $id);

            return $user;

        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
