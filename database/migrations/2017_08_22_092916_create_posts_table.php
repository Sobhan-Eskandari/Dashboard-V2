<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(true);
            $table->text('body')->nullable(false);
            $table->integer('views')->default(0);
            $table->boolean('lock')->default(false);
            $table->boolean('draft')->default(false);
            $table->unsignedBigInteger('created_by')->nullable(false);
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->unsignedBigInteger('locked_by')->nullable(true);
            $table->integer('revisions')->default(0);
//            $table->dateTime('created_at')->nullable(true);
//            $table->dateTime('updated_at')->nullable(true);
//            $table->dateTime('deleted_at')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
