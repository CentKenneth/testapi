<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPatientChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_chats', function (Blueprint $table) {
            $table->string('image')->nullable()->after('whosend');
            $table->string('image_url')->nullable()->after('image');
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
            $table->dropColumn('image');
            $table->dropColumn('image_url');
        });
    }
}
