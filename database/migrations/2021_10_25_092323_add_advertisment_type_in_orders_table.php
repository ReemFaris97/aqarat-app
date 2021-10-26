<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvertismentTypeInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::statement("ALTER TABLE `orders` CHANGE `type` `type` ENUM('request','offer','advertisement') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;");
            DB::statement("ALTER TABLE `orders` CHANGE `advertiser` `advertiser` ENUM('owner','agent','marketer') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;");
            DB::statement("ALTER TABLE `orders` CHANGE `contract` `contract` ENUM('buy','sell','rent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;");
            $table->decimal('price')->nullable()->change();
            $table->unsignedBigInteger('category_id')->nullable()->change();
            $table->foreignIdFor(\App\Models\AdvertisementType::class)->nullable()->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropConstrainedForeignId('advertisement_type_id');
        });
    }
}
