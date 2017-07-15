<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterResearchEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_equipment', function (Blueprint $table) {
            //
            $table->foreign('re_major')->references('major_id')->on('majors');
            $table->foreign('re_year')->references('year_id')->on('year');
            $table->foreign('re_status')->references('re_status_id')->on('research_equipment_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_equipment', function (Blueprint $table) {
            //
        });
    }
}
