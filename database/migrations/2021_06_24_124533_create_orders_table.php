<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('image');
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\Category::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Neighborhood::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('contract',['buy','sell']);
            $table->enum('type',['request','offer']);
            $table->enum('advertiser',['owner','agent','marketer']);
            $table->double('lat');
            $table->double('lng');
            $table->string('address');
            $table->decimal('price');
            $table->text('description');
            $table->boolean('is_reviewed')->default(0);
            $table->boolean('is_active')->default(1);

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
        Schema::dropIfExists('orders');
    }
}
