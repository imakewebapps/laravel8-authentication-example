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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',50)->nullable();
            $table->bigInteger('user_id');
            $table->string('mode',10);
            $table->string('token',64)->nullable()->default(null);
            $table->string('amount',15);
            $table->string('currency',6);
            $table->string('note',30)->nullable();
            $table->string('status',8)->nullable()->default('pending');
            $table->string('successredirect',60);
            $table->string('failredirect',60);
            $table->string('callbackurl',30);
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
        Schema::dropIfExists('deposits');
    }
};
