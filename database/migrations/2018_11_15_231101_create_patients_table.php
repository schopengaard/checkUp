<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 16);
            $table->string('last_name', 16);
            $table->tinyInteger('age');
            $table->string('email', 30)->unique();
            $table->string('username', 16)->unique();
            $table->text('password'); 
            $table->bigInteger('care_card');
            $table->rememberToken();      
        });
        DB::statement("ALTER TABLE patient AUTO_INCREMENT = 30000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient');
    }
}
