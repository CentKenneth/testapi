<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsOnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('firstname')->nullable()->after('name');
            $table->string('lastname')->nullable()->after('firstname');
            $table->string('height')->nullable()->after('lastname');
            $table->string('weight')->nullable()->after('height');
            $table->string('bday')->nullable()->after('weight');
            $table->string('gender')->nullable()->after('bday');
            $table->string('phone')->nullable()->after('gender');
            $table->string('street_address')->nullable()->after('phone');
            $table->string('city')->nullable()->after('street_address');
            $table->string('role')->nullable()->after('city');
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
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('bday');
            $table->dropColumn('gender');
            $table->dropColumn('phone');
            $table->dropColumn('street_address');
            $table->dropColumn('city');
            $table->dropColumn('role');
        });
    }
}
