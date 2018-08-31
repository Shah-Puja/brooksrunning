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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->enum('gender', ['Female', 'Male']);
            $table->string('birthday_date', 2)->nullable();
            $table->string('birthday_month', 2)->nullable();
            $table->enum('age_group', ['18 and under', '19 to 30', '31 to 40', '41 to 50', '51 to 60', '60 plus'])
                            ->nullable();
            $table->enum('state', ['ACT', 'NSW', 'NT', 'QLD', 'SA', 'TAS', 'VIC', 'WA', 'Other']);
            $table->string('postcode');        
            $table->boolean('newsletter_subscription');
            $table->string('phone')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
