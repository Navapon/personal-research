<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->string('blog_title',1000);
            $table->string('blog_information',1000);
            $table->string('blog_content',3500);
            $table->unsignedInteger('blog_type');
            $table->string('blog_status',50);
            $table->string('blog_image',500);
            $table->string('blog_email_flag',50)->nullable();
            $table->unsignedInteger('u_id');
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
        Schema::dropIfExists('blog');
    }
}
