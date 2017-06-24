<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterResearchConferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_conference', function (Blueprint $table) {

            $table->unsignedInteger('rc_publish_level')->change();
            $table->unsignedInteger('rc_proceeding_type')->change();
            $table->unsignedInteger('rc_present_type')->change();

            $table->foreign('rc_publish_level')->references('rl_id')->on('research_level');
            $table->foreign('rc_proceeding_type')->references('rpt_id')->on('research_proceeding_type');
            $table->foreign('rc_present_type')->references('rsp_id')->on('research_present_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_conference', function (Blueprint $table) {
            //
        });
    }
}
