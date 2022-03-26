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
        Schema::create('fish_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->foreignId('pet_fishes_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('food_fishes_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('quantityFish');
            $table->float('quantityKG');
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
        Schema::dropIfExists('fish_orders');
    }
};
