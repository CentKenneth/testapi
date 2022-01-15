<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePatientChats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_chats', function (Blueprint $table) {
            $table->enum('whosend', ['Patient', 'Doctor'])->default('Doctor')->after('messages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient_chats', function (Blueprint $table) {
            $table->dropColumn('whosend');
        });
    }
}
