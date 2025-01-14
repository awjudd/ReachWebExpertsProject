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
            
            $table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('restaurant_id');
			
			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
				
			$table->foreign('restaurant_id')
				->references('id')->on('restaurants')
				->onDelete('cascade');
			
            $table->integer('rating');
			$table->text('content');
			$table->date('time_submitted');
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
}
