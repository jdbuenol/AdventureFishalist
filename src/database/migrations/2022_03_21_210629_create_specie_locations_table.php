<?php
//AUTHOR: Juanjose Madrigal

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
        Schema::create(
            'specie_locations', function (Blueprint $table) {
                $table->id();
                $table->float('poblationalDensity');
                $table->foreignId('location_id')->constrained()->onDelete('cascade');
                $table->foreignId('specie_id')->constrained()->onDelete('cascade');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specie_locations');
    }
};
