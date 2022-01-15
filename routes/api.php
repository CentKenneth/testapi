<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| 
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// guest user
Route::post('register', [UserController::class, 'registerUser']);
// guest doctor
Route::post('register-doctor', [UserController::class, 'registerDoctor']);
Route::post('auth/logout', [UserController::class, 'logout']);
// transaction


// Authorized Routes
Route::group(['middleware' => ['auth:api']], function () {
    Route::prefix('authorized')->group(function () {
        // User
        Route::get('auth', [UserController::class, 'authDetails']);
        Route::post('change-password', [UserController::class, 'changePassword']);
        Route::post('update-user', [UserController::class, 'updateUser']);
        Route::get('doctor-email', [UserController::class, 'getDoctorEmail']);
        Route::get('patient-email', [UserController::class, 'getPatientEmail']);

        // Patient chats
        Route::post('get-patient-chats', [PatientController::class, 'getPatientChats']);
        Route::post('get-patient-chats-by-doctor', [PatientController::class, 'getPatientChatsByDoctor']);
        Route::post('patient-chats', [PatientController::class, 'PatientChats']);
        Route::post('patient-chats-with-upload', [PatientController::class, 'PatientChatsWithUpload']);

        // Prescription
        Route::post('create-prescription', [PatientController::class, 'createPrescription']);
        Route::post('get-prescription', [PatientController::class, 'getPrescription']);
        Route::post('get-prescription-by-doctor', [PatientController::class, 'getPrescriptionByDoctor']);
        Route::post('update-prescription', [PatientController::class, 'updatePrescription']);

        // Doctor chats
        Route::post('get-doctor-chats', [PatientController::class, 'getDoctorChats']);
        Route::post('get-doctor-chats-by-patient', [PatientController::class, 'getPatientChatsByPatient']);

        // Transaction
        Route::post('schedule', [TransactionController::class, 'scheduleTransaction']);
        Route::post('schedule-appointment', [TransactionController::class, 'appointmentTransaction']);
        Route::post('prescription-transaction', [TransactionController::class, 'prescriptionTransaction']);
        Route::get('transaction-by-doctors-email/{email}', [TransactionController::class, 'getTransactionByDoctorsEmail']);
        Route::get('transaction-by-patients-email/{email}', [TransactionController::class, 'getTransactionByPatientsEmail']);

        // Doctor Schedule
        Route::post('schedule-doctor-create', [DoctorController::class, 'createScheduleDoctor']);
        Route::get('schedule-doctor-get', [DoctorController::class, 'getScheduleDoctor']);
        Route::post('schedule-doctor-delete/{id}', [DoctorController::class, 'deleteScheduleDoctor']);
        Route::post('schedule-doctor-update', [DoctorController::class, 'updateScheduleDoctor']);
        Route::get('get-doctor-by-specialization/{name}', [DoctorController::class, 'getDoctorBySpecialization']);
        Route::get('get-doctor-schedule-by-id/{id}', [DoctorController::class, 'getDoctorScheduleById']);

        // Apointment
        Route::get('appointment-by-patients-email/{email}', [TransactionController::class, 'getAppointmentByPatientsEmail']);
        Route::get('prescription-by-doctors-email/{email}', [TransactionController::class, 'getPrescriptionByDoctorsEmail']);

        // Patient Schedule
        Route::post('patient-schedule', [PatientController::class, 'createPatientSchedule']);
        Route::post('get-patient-schedule', [PatientController::class, 'getPatientSchedule']);
        Route::post('get-patient-schedule-by-doctor', [PatientController::class, 'getPatientScheduleBydoctor']);
        Route::post('edit-patient-schedule', [PatientController::class, 'editPatientSchedule']);
    });
});
