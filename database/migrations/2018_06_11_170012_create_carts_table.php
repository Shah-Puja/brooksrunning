<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->unSignedInteger('user_id')->nullable();
            $table->unsignedSmallInteger('items_count')->default(0);          
            $table->decimal('total', 19, 2)->nullable();
            $table->decimal('gst', 19, 2)->nullable();
            $table->string('delivery_type', 50)->nullable();
            $table->decimal('freight_cost', 19, 2)->nullable();
            $table->decimal('discount', 19, 2)->nullable();
            $table->decimal('grand_total', 19, 2)->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
