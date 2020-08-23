<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook', function (Blueprint $table) {
            $table->id();

            $table->string('place_of_origin');
            $table->string('observations');
            $table->date('stay');
            $table->dateTime('entry');
            $table->dateTime('departure');

            $table->foreignId('receptionist_id')->constrained('receptionists');
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('bedroom_id')->constrained('bedrooms');

            $table->engine = 'InnoDB';
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
        Schema::dropIfExists('logbook');
    }
}
