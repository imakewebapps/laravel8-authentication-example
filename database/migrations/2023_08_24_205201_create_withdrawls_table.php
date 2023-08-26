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
        Schema::create('withdrawls', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',50)->nullable();
            $table->bigInteger('user_id');
            $table->string("mode",40);
            $table->string("name",40);
            $table->string("details",40);
            $table->string("amount",10);
            $table->string("currency",4);
            $table->string("callbackurl",100);
            $table->string('status',8)->nullable()->default('pending');
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
        Schema::dropIfExists('withdrawls');
    }
};
