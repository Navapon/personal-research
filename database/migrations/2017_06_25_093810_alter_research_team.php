<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterResearchTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_team', function (Blueprint $table) {
            //

            $table->unsignedInteger('rj_id')->change();
            $table->unsignedInteger('rc_id')->change();
            $table->unsignedInteger('rp_id')->change();
            $table->unsignedInteger('patent_id')->change();
            
            $table->foreign('rj_id')->references('rj_id')->on('research_journal');
            $table->foreign('rc_id')->references('rc_id')->on('research_conference');
            $table->foreign('rp_id')->references('rp_id')->on('research_project');
            $table->foreign('patent_id')->references('pt_id')->on('research_patent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_team', function (Blueprint $table) {
            //
        });
    }
}
