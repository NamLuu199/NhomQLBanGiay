<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image',255)->nullable()->default(null);
            $table->integer('parent_id')->nullable()->unsigned();;
            $table->foreign('parent_id')->references('id')->on('categories');
            // thêm khóa ngoại
            $table->integer('position')->unsigned()->default(0);
            $table->integer('is_active')->unsigned()->default(1);
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
        Schema::dropIfExists('categories');
    }
}
