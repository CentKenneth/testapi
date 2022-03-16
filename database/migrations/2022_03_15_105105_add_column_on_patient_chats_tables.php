<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnPatientChatsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_chats', function (Blueprint $table) {
            $table->enum('is_view', ['Yes', 'No'])->default('No')->after('whosend');
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
            $table->dropColumn('is_view');
        });
    }
}
