<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
//            $table->boolean('seen')->default(false);
            $table->enum('status', ['not-checked', 'checking', 'checked'])->default('not-checked');
            $table->uuid('tracking_code');
            $table->dateTime('answered_at')->nullable(true);
            $table->unsignedBigInteger('answered_by')->nullable(true);
            $table->unsignedBigInteger('seen_by')->nullable(true);
//            $table->dateTime('created_at')->nullable(true);
//            $table->dateTime('updated_at')->nullable(true);
//            $table->unsignedBigInteger('updated_by')->nullable(true);
//            $table->dateTime('deleted_at')->nullable(true);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inboxes');
    }
}
