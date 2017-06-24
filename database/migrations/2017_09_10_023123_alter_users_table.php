<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
//        Schema::enableForeignKeyConstraints();

        Schema::table('users', function (Blueprint $table) {

            $table->unsignedInteger('u_academic_id')->nullable()->change();
            $table->unsignedInteger('u_major_id')->nullable()->change();
            $table->unsignedInteger('u_role_id')->nullable()->change();

            $table->foreign('u_academic_id')->references('academic_id')->on('users_academic');
            $table->foreign('u_major_id')->references('major_id')->on('majors');
            $table->foreign('u_role_id')->references('role_id')->on('users_role');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {


        Schema::table('users', function (Blueprint $table) {
            //

            $table->dropForeign('u_academic_id_foreign');
            $table->dropForeign('u_role_id_foreign');
            $table->dropForeign('u_major_id_foreign');
        });
    }
}
