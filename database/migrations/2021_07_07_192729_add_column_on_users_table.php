<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('degreelevel')->nullable()->after('lastname');
            $table->string('degreefield')->nullable()->after('degreelevel');
            $table->string('clinicname')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('degreelevel');
            $table->dropColumn('degreefield');
            $table->dropColumn('clinicname');
        });
    }
}
