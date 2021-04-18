<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 16);
            $table->string('last_name', 16);
            $table->tinyInteger('age');
            $table->string('email', 30)->unique();
            $table->string('username', 16)->unique();
            $table->string('password', 16); 
            $table->string('specialty', 20);
            $table->string('city', 16);
            $table->string('address', 50);            
            $table->rememberToken();
        });
        DB::statement("ALTER TABLE doctor AUTO_INCREMENT = 20000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor');
    }
}
