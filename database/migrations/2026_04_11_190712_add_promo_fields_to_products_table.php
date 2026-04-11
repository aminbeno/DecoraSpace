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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('is_promoted')->default(false)->after('price');
            $table->bigInteger('promo_price')->nullable()->after('is_promoted');
            $table->dateTime('promo_start_at')->nullable()->after('promo_price');
            $table->dateTime('promo_end_at')->nullable()->after('promo_start_at');
            $table->string('promo_label')->nullable()->after('promo_end_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['is_promoted', 'promo_price', 'promo_start_at', 'promo_end_at', 'promo_label']);
        });
    }
};
