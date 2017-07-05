<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchPatent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_patent', function (Blueprint $table) {
            $table->increments('pt_id');
            $table->string('pt_name');
            $table->string('pt_description',1000);
            $table->string('pt_number');
            $table->string('pt_meta_tag',300);
            $table->integer('pt_type');
            $table->integer('pt_publish_level');
            $table->date('pt_accept');
            $table->date('pt_expire');
            $table->softDeletes();
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
        Schema::dropIfExists('research_subject');
    }
}
