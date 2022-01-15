<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')
            ->references('id')
            ->on('schedules')
            ->onDelete('cascade');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('name')->nullable();
            $table->dateTime('bday')->nullable();
            $table->string('address')->nullable();
            $table->string('weigth')->nullable();
            $table->string('heigth')->nullable();
            $table->string('diagnosis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_schedules');
    }
}
