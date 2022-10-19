<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Patient\CreateSchedule;
use App\Http\Requests\Patient\PatientSchedule;
use App\Http\Requests\Patient\PrintPatientSchedule;
use App\Http\Requests\Patient\updateSchedule;
use App\Http\Requests\Patient\PatientChat;
use App\Http\Requests\Patient\CreatePatientChat;
use App\Http\Requests\Patient\CreatePrescription;
use App\Http\Requests\Patient\PatientChatNotifications;
use App\Http\Requests\Patient\GetPrescription;


class PatientController extends Controller
{
    
    public function getPatientScheduleImages($id) {
        try {

            $data = resolve('PatientSchedulesImages')->getModel()->where('schedules_id', $id)->get();

            return $data;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createPatientSchedule(CreateSchedule $request) {
        try {

            $data = collect($request->validated())
            ->except('images')
            ->toArray();

            return resolve('PatientServices')->store($data, $request->file('images'));
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function createPatientScheduleFace(CreateSchedule $request) {
        try {

            $data = collect($request->validated())
            ->toArray();

            return resolve('PatientServices')->storeFace($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printScheduleFace(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printScheduleFace($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printScheduleFaceHistory(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printScheduleFaceHistory($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printScheduleHistory(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printScheduleHistory($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printScheduleInfo(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printScheduleInfo($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printScheduleFaceInfo(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printScheduleFaceInfo($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printPaymentSummary(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printPaymentSummary($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printPaymentHistory(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printPaymentHistory($request->toArray());
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function printSchedule(PrintPatientSchedule $request) {
        try {
            return resolve('PatientServices')->printSchedule($request->toArray());
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

    public function getPatientScheduleFace(PatientSchedule $request) {
        try {
            return resolve('PatientServices')->indexFace($request->toArray());
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

    public function getPatientScheduleBydoctorFace(PatientSchedule $request) {
        try {
            return resolve('PatientServices')->indexFace($request->toArray());
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

    public function editPatientScheduleFace(updateSchedule $request) {
        try {
            $data = collect($request->validated())
                    ->except(['id'])
                    ->toArray();

            return resolve('PatientServices')->updateFace($data, $request->id);
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
                ->except('signature')
                ->toArray();

            return resolve('PatientServices')->createPrescription($data, $request->signature);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescription(GetPrescription $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPrescription($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function getPrescriptionByDoctor(GetPrescription $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->getPrescriptionByDoctor($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function PatientChatsNotifications(PatientChatNotifications $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->PatientChatsNotifications($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function DoctorChatsNotifications(PatientChatNotifications $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->DoctorChatsNotifications($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function PatientChatsUpdateNotifications(PatientChatNotifications $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->PatientChatsUpdateNotifications($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function DoctorChatsUpdateNotifications(PatientChatNotifications $request) {
        try {
            $data = collect($request->validated())
                ->toArray();

            return resolve('PatientServices')->DoctorChatsUpdateNotifications($data);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    // test controller for pdf
    public function showEmployees() {
        $prescription = resolve('PatientChat')->all();
        return view('pdf.reports-patient-info', compact('prescription'));
    }
}
