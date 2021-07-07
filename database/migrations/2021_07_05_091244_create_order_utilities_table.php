<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderUtilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_utilities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Order::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Utility::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('order_utilities');
    }
}
