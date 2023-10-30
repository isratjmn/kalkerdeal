<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->unique();
            $table->longText('description');
            $table->string('slug', 100)->unique();
            $table->string('category_thumbnail', 100)->default('defaultcategory.png');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /*** Reverse the migrations. ***/
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
