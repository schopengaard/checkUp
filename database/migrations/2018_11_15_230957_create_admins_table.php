<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 16);
            $table->string('last_name', 16);
            $table->string('email', 30)->unique();
            $table->string('username', 16)->unique();
            $table->string('password', 16);        
            $table->rememberToken();        
        });
        DB::statement("ALTER TABLE admin AUTO_INCREMENT = 10000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
