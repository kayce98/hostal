<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropIfExistsReceptionistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('receptionists');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('receptionists', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('password');
            $table->boolean('is_enable');
            $table->foreignId('person_id')->constrained('persons');
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }
}
