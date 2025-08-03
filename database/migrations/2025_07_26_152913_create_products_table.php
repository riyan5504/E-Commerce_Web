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
            $table->string('name');
            $table->string('slug');
            $table->string('type');
            $table->string('image');
            $table->string('code')->unique();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->integer('qty');
            $table->double('buying_price');
            $table->double('reguler_price');
            $table->double('discount_price')->nullable();
            $table->longText('description');
            $table->longText('p_policy');
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
