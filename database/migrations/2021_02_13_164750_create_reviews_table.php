<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id()->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('apartment_id')->unsigned();
            $table->string('comment');
            $table->bigInteger('reviews_type_id')->nullable()->unsigned();
            $table->bigInteger('helpful')->default(0);
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reviews_type_id')->references('id')->on('reviews_types')->onDelete('cascade')->onUpdate('cascade');

        });
    }
//User_Id foreign key
//Apartment_Id foreign key
//helpful default 0
//Videos(nullable)
//Images(nullable)
//Reviews_Type

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
