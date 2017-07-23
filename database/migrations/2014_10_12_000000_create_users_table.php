<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    protected $table = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('u_id');
            $table->string('u_identity',13)->nullable();
            $table->tinyInteger('u_academic_id');
            $table->string('u_name_th')->nullable();
            $table->string('u_surname_th')->nullable();
            $table->string('u_name_en')->nullable();
            $table->string('u_surname_en')->nullable();
            $table->string('u_sex')->nullable();
            $table->string('u_email',250)->unique();
            $table->string('u_username')->unique();
            $table->string('password');
            $table->mediumInteger('u_major_id');
            $table->tinyInteger('u_role_id');
            $table->unsignedInteger('u_position');
            $table->string('u_description',1000)->nullable();
            $table->string('u_birthdate')->nullable();
            $table->string('u_image')->nullable();
            $table->string('u_phone')->nullable();
            $table->string('u_facebook')->nullable();
            $table->string('u_line')->nullable();
            $table->string('u_instragram')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
