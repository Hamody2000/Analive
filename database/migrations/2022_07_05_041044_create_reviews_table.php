<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->integer('category_id')->default('0');
            $table->integer('product_id')->default('0');
            $table->integer('rating_no')->default('0');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default('1')->comment('0 => inactive, 1 => active');
            $table->string('theme_id')->nullable();
            $table->integer('store_id');
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
        Schema::dropIfExists('reviews');
    }
};
