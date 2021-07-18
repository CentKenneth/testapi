<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\DoctorController;

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
// transaction


// Authorized Routes
Route::group(['middleware' => ['auth:api']], function () {
    Route::prefix('authorized')->group(function () {
        // User
        Route::get('auth', [UserController::class, 'authDetails']);
        Route::get('doctor-email', [UserController::class, 'getDoctorEmail']);
        Route::get('patient-email', [UserController::class, 'getPatientEmail']);

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
    });
});
