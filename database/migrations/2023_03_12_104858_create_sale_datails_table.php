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
        Schema::create('sale_datails', function (Blueprint $table) {
            $table->id();
            $table->integer('sale_id');
            $table->integer('menu_id');
            $table->string('menu_name');
            $table->integer('menu_price');
            $table->integer('quantity');
            $table->string('status')->default('noConfirm'); // confirm or noconfirm
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
        Schema::dropIfExists('sale_datails');
    }
};
