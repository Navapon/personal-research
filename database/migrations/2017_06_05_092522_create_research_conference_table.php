<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchConferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_conference', function (Blueprint $table) {
            $table->increments('rc_id');
            $table->string('rc_article_name',250);
            $table->date('rc_publish_date');
            $table->string('rc_meeting_name',250);
            $table->string('rc_meeting_owner');
            $table->string('rc_meeting_place');
            $table->string('rc_meeting_province');
            $table->date('rc_meeting_start');
            $table->date('rc_meeting_end');
            $table->string('rc_volume')->nullable();
            $table->string('rc_issue')->nullable();
            $table->string('rc_page')->nullable();
            $table->string('rc_abstract',1000)->nullable();
            $table->string('rc_evaluate_article')->nullable();
            $table->integer('rc_publish_level');
            $table->integer('rc_proceeding_type');
            $table->integer('rc_present_type');
            $table->string('rc_award')->nullable();
            $table->string('rc_file');
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
        Schema::dropIfExists('research_conference');
    }
}
