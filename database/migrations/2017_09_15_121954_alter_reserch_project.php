<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReserchProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('research_project', function (Blueprint $table) {
            //
            $table->unsignedInteger('fund_id')->change();
            $table->unsignedInteger('rp_status')->change();
            $table->unsignedInteger('rp_year')->change();

            $table->foreign('fund_id')->references('fund_id')->on('fund_type');
            $table->foreign('rp_status')->references('rst_id')->on('research_status');
            $table->foreign('rp_year')->references('year_id')->on('year');

            $table->foreign('status')->references('status_id')->on('commit_status');
            $table->foreign('approver')->references('u_id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('research_project', function (Blueprint $table) {
            //
        });
    }
}
