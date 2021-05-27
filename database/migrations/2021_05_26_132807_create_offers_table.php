<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Neighborhood::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal('views');
            $table->string('title');
            $table->string('image');
            $table->enum('estate_type', ['landvilla', 'floor', 'Aِpartment', 'building', 'office', 'showrooms', 'warehouses', 'rest'])->default('floor');
            $table->enum('contract_type', ['sell', 'rent'])->default('rent');
            $table->enum('advertiser_type', ['Owner', 'agent', 'marketer'])->default('marketer');
            $table->decimal('price');
            $table->string('lat');
            $table->string('lng');
            $table->string('number_of_rooms')->nullable();
            $table->string('number_of_halls')->nullable();
            $table->string('number_of_boards')->nullable();
            $table->string('number_of_vents')->nullable();
            $table->string('number_of_toilets')->nullable();
            $table->string('number_of_kitchens')->nullable();
            $table->string('facilities')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('offers');
    }
}
