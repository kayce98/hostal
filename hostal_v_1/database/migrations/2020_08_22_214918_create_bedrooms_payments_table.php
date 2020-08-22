<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedroomsPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedrooms_payments', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('payment_id')->constrained('payments');
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
        Schema::dropIfExists('bedrooms_payments');
    }
}
