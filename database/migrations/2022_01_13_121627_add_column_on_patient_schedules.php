<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnPatientSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_schedules', function (Blueprint $table) {
            $table->enum('status', ['Done', 'Pending', 'Canceled'])->default('Pending')->after('diagnosis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_schedules', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
