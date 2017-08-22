<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outboxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inbox_id');
            $table->string('subject');
            $table->text('message');
            $table->unsignedBigInteger('created_by')->nullable(true);
//            $table->dateTime('created_at')->nullable(true);
//            $table->dateTime('updated_at')->nullable(true);
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
        Schema::dropIfExists('outboxes');
    }
}
