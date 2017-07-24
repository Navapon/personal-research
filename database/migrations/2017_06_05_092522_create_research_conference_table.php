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
            $table->string('rc_article_name',1000);
            $table->string('rc_abstract',3000);
            $table->string('rc_meta_tag',500);
            $table->date('rc_publish_date');
            $table->string('rc_evaluate_article')->nullable();
            $table->integer('rc_proceeding_type');
            $table->integer('rc_present_type');
            $table->integer('rc_publish_level');
            $table->string('rc_volume')->nullable();
            $table->string('rc_issue')->nullable();
            $table->string('rc_page')->nullable();
            $table->string('rc_award')->nullable();
            $table->string('rc_file');
            $table->string('rc_meeting_name',400);
            $table->string('rc_meeting_owner');
            $table->string('rc_meeting_place');
            $table->string('rc_meeting_province');
            $table->date('rc_meeting_start');
            $table->date('rc_meeting_end');

            $table->unsignedInteger('status')->default(1);
            $table->unsignedInteger('approver')->nullable();

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
        Schema::dropIfExists('research_conference');
    }
}
