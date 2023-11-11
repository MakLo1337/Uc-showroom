<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->char('Type', 20);
            $table->char('Model', 50);
            $table->integer('Year');
            $table->integer('PassangerAmount');
            $table->char('Manufacture', 50);
            $table->decimal('Price',20,2);
            $table->char('FuelType', 50)->nullable(); //Car
            $table->integer('TrunkSpace')->nullable(); //Car
            $table->integer('TireAmount')->nullable(); //Truck
            $table->integer('CargoSpace')->nullable(); //Truck
            $table->integer('BaggageSpace')->nullable(); //Motorcycle
            $table->integer('FuelCapacity')->nullable(); //Motorcycle
            $table->string('VehicleImage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
