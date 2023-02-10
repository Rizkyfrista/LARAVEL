<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            //$table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('city_state_zip');
            $table->integer('home_phone');
            $table->integer('cell_phone');
            $table->string('email');
            $table->string('applied_position');
            $table->integer('expected_salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};
