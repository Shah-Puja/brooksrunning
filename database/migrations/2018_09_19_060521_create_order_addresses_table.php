<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');                      
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('b_add1');
            $table->string('b_add2')->nullable();
            $table->string('b_city');
            $table->string('b_postcode');
            $table->string('b_state');
            $table->string('b_country');
            $table->string('b_phone');
            $table->boolean('signme')->default(0);
            $table->text('order_info')->nullable();
            $table->boolean('nosignaturedelivery')->default(0);  
            $table->enum('flag_same_shipping', ['Yes', 'No']);
            $table->string('s_fname')->nullable();
            $table->string('s_lname')->nullable();    
            $table->string('s_add1')->nullable();
            $table->string('s_add2')->nullable();
            $table->string('s_city')->nullable();
            $table->string('s_postcode')->nullable();
            $table->string('s_state')->nullable();
            $table->string('s_country')->nullable();
            $table->string('s_phone')->nullable(); 
            $table->timestamps();

            $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_addresses');
    }
}
