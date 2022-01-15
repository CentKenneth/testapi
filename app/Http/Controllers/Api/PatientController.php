<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Patient\CreateSchedule;
use App\Http\Requests\Patient\PatientSchedule;
use App\Http\Requests\Patient\updateSchedule;
use App\Http\Requests\Patient\PatientChat;
use App\Http\Requests\Patient\CreatePatientChat;
use App\Http\Requests\Patient\CreatePrescription;
use App\Http\Requests\Patient\getPrescription;


class PatientController extends Controller
{
    
    public function createPatientSchedule(CreateSchedule $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('PatientServices')->store($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientSchedule(PatientSchedule $request) {
        try {
            return resolve('PatientServices')->index($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientScheduleBydoctor(PatientSchedule $request) {
        try {
            return resolve('PatientServices')->index($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function editPatientSchedule(updateSchedule $request) {
        try {
            $data = collect($request->validated())
                    ->except(['id'])
                    ->toArray();

            return resolve('PatientServices')->update($data, $request->id);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientChats(PatientChat $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPatientChats($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getDoctorChats(PatientChat $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getDoctorChats($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientChatsByDoctor(PatientChat $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPatientChatsByDoctor($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPatientChatsByPatient(PatientChat $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPatientChatsByPatient($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function PatientChats(CreatePatientChat $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->storePatientChats($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function PatientChatsWithUpload(CreatePatientChat $request) {
        try {
            $data = collect($request->validated())
                ->except('image')
                ->toArray();

            return resolve('PatientServices')->storePatientChatsWithUpload($data, $request->image);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createPrescription(CreatePrescription $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->createPrescription($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescription(getPrescription $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPrescription($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescriptionByDoctor(getPrescription $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPrescriptionByDoctor($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    // test controller for pdf
    public function showEmployees() {
        $prescription = resolve('PatientChat')->all();
        return view('pdf.prescription', compact('prescription'));
    }
}
