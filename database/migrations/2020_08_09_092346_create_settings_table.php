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
            $table->bigIncrements('id');
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('hotline')->nullable();
            $table->string('tax')->nullable();
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('introduce')->nullable();
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
