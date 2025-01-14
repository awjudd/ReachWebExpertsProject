<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     * This is the table for unapproved restaurants.
     * I'm trying to make it so you can't create restaurants of the same name.
     * But the migrations won't even run and this is driving me crazy.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_applications', function (Blueprint $table) {
            
            $table->bigIncrements('id');
			$table->unsignedBigInteger('admin_id');
			
			$table->foreign('admin_id')
				->references('id')->on('admins')
				->onUpdate('cascade')
				->onDelete('cascade');
			
			$table->string('name');
			$table->text('description');
			$table->string('slug');
			$table->json('address');
			$table->json('cuisine');
			$table->string('image')->nullable();
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
        Schema::dropIfExists('restaurant_applications');
    }
}
