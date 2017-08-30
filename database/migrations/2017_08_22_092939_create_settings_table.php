<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('site_title')->nullable(false);
            $table->mediumText('meta_description')->nullable(true);
            $table->string('email')->nullable(false);
            $table->char('land_line', 11)->nullable(false);
            $table->char('land_line2', 11)->nullable(false);
            $table->char('mobile_number', 11)->nullable(false);
            $table->char('mobile_number2', 11)->nullable(false);
            $table->char('zip', 10)->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('logo')->nullable(true);
            $table->string('instagram')->nullable(true)->default('https://www.instagram.com/');
            $table->string('telegram')->nullable(true)->default('https://telegram.org/');
            $table->string('facebook')->nullable(true)->default('https://www.facebook.com/');
            $table->string('linkedin')->nullable(true)->default('https://www.linkedin.com/');
            $table->string('twitter')->nullable(true)->default('https://twitter.com/');
            $table->string('aparat')->nullable(true)->default('http://www.aparat.com/');
            $table->text('terms')->nullable(true);
            $table->text('about_us')->nullable(true);
            $table->text('about_site')->nullable(true);
            $table->text('guide')->nullable(true);
            $table->text('header')->nullable(true);
            $table->string('favicon')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(true);
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->integer('revisions')->default(0);
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
        Schema::dropIfExists('settings');
    }
}
