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
        Schema::create('food_fishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specie_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->string('cut');
            $table->float('pricePerKG');
            $table->float('inventoryKG');
            $table->float('quantityBought');
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
        Schema::dropIfExists('food_fishes');
    }
};
