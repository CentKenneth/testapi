<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Requests\Schedule\Schedule;
use App\Http\Requests\Schedule\ScheduleGet;
use App\Http\Requests\Schedule\ScheduleUpdate;

class DoctorController extends Controller
{
    public function createScheduleDoctor(Schedule $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('ScheduleServices')->store($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createScheduleDoctorFtoF(Schedule $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('ScheduleServices')->storeFtoF($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getScheduleDoctor(ScheduleGet $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('ScheduleServices')->index($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getScheduleDoctorFtoF(ScheduleGet $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('ScheduleServices')->indexFtoF($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function deleteScheduleDoctor($id) {
        try {

            return resolve('ScheduleServices')->delete($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function deleteChat($id) {
        try {

            return resolve('ScheduleServices')->deleteChat($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function deleteScheduleDoctorFtoF($id) {
        try {

            return resolve('ScheduleServices')->deleteFtoF($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function updateScheduleDoctor(ScheduleUpdate $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('ScheduleServices')->update($data, $data['id']);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function updateScheduleDoctorFtoF(ScheduleUpdate $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('ScheduleServices')->updateFtoF($data, $data['id']);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorBySpecialization($name) {
        try {
            return resolve('ScheduleServices')->getDoctorBySpecialization($name);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorScheduleById($id) {
        try {
            return resolve('ScheduleServices')->getDoctorScheduleById($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorScheduleByIdFacetoFace($id) {
        try {
            return resolve('ScheduleServices')->getDoctorScheduleByIdFacetoFace($id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
