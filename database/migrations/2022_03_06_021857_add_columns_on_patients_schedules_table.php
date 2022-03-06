<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsOnPatientsSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_schedules', function (Blueprint $table) {
            $table->string('case_history')->nullable()->after('payments');
            $table->string('other_history')->nullable()->after('case_history');
            $table->string('chief_complaints')->nullable()->after('other_history');
            $table->string('other_complaints')->nullable()->after('chief_complaints');

            $table->string('cornea')->nullable()->after('other_complaints');
            $table->string('conjunctiva')->nullable()->after('cornea');
            $table->string('eyelids')->nullable()->after('conjunctiva');
            $table->string('mgd')->nullable()->after('eyelids');
            $table->string('lens')->nullable()->after('mgd');
            $table->string('pupil')->nullable()->after('lens');
            $table->string('iris')->nullable()->after('pupil');
            $table->string('puncta')->nullable()->after('iris');

            $table->string('oldrx_od')->nullable()->after('puncta');
            $table->string('oldrx_sph')->nullable()->after('oldrx_od');
            $table->string('oldrx_cx')->nullable()->after('oldrx_sph');
            $table->string('oldrx_os')->nullable()->after('oldrx_cx');
            $table->string('oldrx_os_sph')->nullable()->after('oldrx_os');
            $table->string('oldrx_os_cx')->nullable()->after('oldrx_os_sph');
            $table->string('oldrx_add')->nullable()->after('oldrx_os_cx');

            $table->string('newrx_od')->nullable()->after('oldrx_add');
            $table->string('newrx_sph')->nullable()->after('newrx_od');
            $table->string('newrx_cx')->nullable()->after('newrx_sph');
            $table->string('newrx_os')->nullable()->after('newrx_cx');
            $table->string('newrx_os_sph')->nullable()->after('newrx_os');
            $table->string('newrx_os_cx')->nullable()->after('newrx_os_sph');
            $table->string('newrx_add')->nullable()->after('newrx_os_cx');

            $table->string('fva_odsc')->nullable()->after('newrx_add');
            $table->string('fva_ossc')->nullable()->after('fva_odsc');
            $table->string('fva_ousc')->nullable()->after('fva_ossc');
            $table->string('fva_odcc')->nullable()->after('fva_ousc');
            $table->string('fva_oscc')->nullable()->after('fva_odcc');
            $table->string('fva_oucc')->nullable()->after('fva_oscc');

            $table->string('nva_ousc')->nullable()->after('fva_oucc');
            $table->string('nva_oucc')->nullable()->after('nva_ousc');
            $table->string('nva_pdod')->nullable()->after('nva_oucc');
            $table->string('nva_pdos')->nullable()->after('nva_pdod');
            $table->string('nva_pdou')->nullable()->after('nva_pdos');

            $table->string('doctor_diagnosis')->nullable()->after('nva_pdou');
            $table->string('management')->nullable()->after('doctor_diagnosis');
            $table->string('type_lens')->nullable()->after('management');
            $table->string('type_frame')->nullable()->after('type_lens');

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
            $table->dropColumn('type_frame');
            $table->dropColumn('type_lens');
            $table->dropColumn('management');
            $table->dropColumn('doctor_diagnosis');

            $table->dropColumn('nva_pdou');
            $table->dropColumn('nva_pdos');
            $table->dropColumn('nva_pdod');
            $table->dropColumn('nva_oucc');
            $table->dropColumn('nva_ousc');

            $table->dropColumn('fva_oucc');
            $table->dropColumn('fva_oscc');
            $table->dropColumn('fva_odcc');
            $table->dropColumn('fva_ousc');
            $table->dropColumn('fva_ossc');
            $table->dropColumn('fva_odsc');

            $table->dropColumn('newrx_add');
            $table->dropColumn('newrx_os_cx');
            $table->dropColumn('newrx_os_sph');
            $table->dropColumn('newrx_os');
            $table->dropColumn('newrx_cx');
            $table->dropColumn('newrx_sph');
            $table->dropColumn('newrx_od');

            $table->dropColumn('oldrx_add');
            $table->dropColumn('oldrx_os_cx');
            $table->dropColumn('oldrx_os_sph');
            $table->dropColumn('oldrx_os');
            $table->dropColumn('oldrx_cx');
            $table->dropColumn('oldrx_sph');
            $table->dropColumn('oldrx_od');

            $table->dropColumn('puncta');
            $table->dropColumn('iris');
            $table->dropColumn('pupil');
            $table->dropColumn('lens');
            $table->dropColumn('mgd');
            $table->dropColumn('eyelids');
            $table->dropColumn('conjunctiva');
            $table->dropColumn('cornea');

            $table->dropColumn('other_complaints');
            $table->dropColumn('chief_complaints');
            $table->dropColumn('other_history');
            $table->dropColumn('case_history');
        });
    }
}
