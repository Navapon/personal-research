<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserResearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up ()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('users_research', function (Blueprint $table) {

            $table->unsignedInteger('u_id')->change();
            $table->unsignedInteger('rj_id')->change();
            $table->unsignedInteger('rc_id')->change();

            $table->foreign('u_id')->references('u_id')->on('users');
            $table->foreign('rj_id')->references('rj_id')->on('research_journal');
//            $table->foreign('rc_id')->references('rc_id')->on('research_conference');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down ()
    {
        Schema::table('users_research', function (Blueprint $table) {
            //
        });
    }
}
