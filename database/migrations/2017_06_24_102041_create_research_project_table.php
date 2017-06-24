<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_project', function (Blueprint $table) {
            $table->increments('rp_id');
            $table->string('rp_name',500);
            $table->string('rp_abstract',1000);
            $table->decimal('rp_amount',12,2);
            $table->integer('fund_id');
            $table->string('rp_fund_name',250)->nullable();
            $table->integer('rp_year');
            $table->integer('rp_status');
            $table->date('rp_start');
            $table->date('rp_end');
            $table->string('rp_file',350)->nullable();
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
        Schema::dropIfExists('research_project');
    }
}
