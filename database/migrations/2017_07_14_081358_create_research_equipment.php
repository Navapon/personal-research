<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_equipment', function (Blueprint $table) {

            $table->increments('re_id');
            $table->string('re_name',500);
            $table->string('re_building',100);
            $table->string('re_room',100)->nullable();
            $table->string('re_floor',100)->nullable();
            $table->string('re_serial_number');
            $table->unsignedInteger('re_major');
            $table->string('re_phone');
            $table->string('re_description',1500);
            $table->unsignedInteger('re_year');
            $table->integer('re_number');
            $table->string('re_namenumber');
            $table->string('re_image');
            $table->unsignedInteger('re_status');

            $table->decimal('re_amount',12,2)->nullable();

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
        Schema::dropIfExists('research_equipment');
    }

}
