<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterResearchPatent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_patent', function (Blueprint $table) {
            //
            $table->unsignedInteger('pt_publish_level')->change();
            $table->unsignedInteger('pt_type')->change();

            $table->foreign('pt_publish_level')->references('rl_id')->on('research_level');
            $table->foreign('pt_type')->references('ptt_id')->on('patent_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reserch_patent', function (Blueprint $table) {
            //
        });
    }
}
