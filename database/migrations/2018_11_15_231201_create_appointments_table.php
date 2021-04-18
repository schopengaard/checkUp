<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('appointment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')->references('id')->on('patient');
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctor');
            $table->string('description', 300);
            $table->string('medicine', 100);
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bill');       
        });
        DB::statement("ALTER TABLE appointment AUTO_INCREMENT = 40000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
        Schema::table('appointment', function(Blueprint $table) {
            $table->dropColumn('patient_id');
            $table->dropColumn('doctor_id');
            $table->dropColumn('bill_id');
        });
    }
}
