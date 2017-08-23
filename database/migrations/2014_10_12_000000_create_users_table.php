<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name')->nullable(true)->unique();
            $table->string('first_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('email')->nullable(true)->unique();
            $table->string('provider')->nullable(true);
            $table->string('provider_id')->nullable(true)->unique();
//            $table->integer('role_id')->default(0);
            $table->string('password')->nullable(true);
            $table->char('land_line',11)->nullable(true);
            $table->char('mobile',11)->nullable(true)->unique();
            $table->text('address')->nullable(true);
            $table->char('zip',10)->nullable(true);
            $table->tinyInteger('gender')->nullable(true);
            $table->string('occupation')->nullable(true);
            $table->text('about')->nullable(true);
            $table->tinyInteger('verified')->default(0);
            $table->unsignedBigInteger('created_by')->nullable(true);
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->string('email_token')->nullable(true);
            $table->rememberToken();
            $table->bigInteger('revisions')->default(0);
            $table->dateTime('last_seen')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
