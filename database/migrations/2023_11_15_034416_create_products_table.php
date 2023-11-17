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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->string('name');
            $table->float('purchase_price', 9, 2);
            $table->float('regular_price', 9, 2);
            $table->float('discount', 9, 2);
            $table->float('discounted_price', 9, 2);
            $table->text('short_description');
            $table->longText('long_description');
            $table->longText('additional_info');
            $table->longText('care_instruction');
            $table->string('product_thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
