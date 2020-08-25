<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyReceptionistIdToLogbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logbook', function (Blueprint $table) {
            $table->dropForeign(['receptionist_id']);
            $table->dropColumn(['receptionist_id']);
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logbook', function (Blueprint $table) {
            $table->foreignId('receptionist_id')->constrained('receptionists');
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });
    }
}
