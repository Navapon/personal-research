<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJournalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_journal', function (Blueprint $table) {

            $table->unsignedInteger('fund_id')->change();
            $table->unsignedInteger('rj_publish_level')->change();

            $table->foreign('fund_id')->references('fund_id')->on('fund_type');
            $table->foreign('rj_publish_level')->references('rl_id')->on('research_level');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_journal', function (Blueprint $table) {
            //
        });
    }
}
