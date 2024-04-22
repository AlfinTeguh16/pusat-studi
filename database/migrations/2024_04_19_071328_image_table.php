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
        Schema::create('tb-images', function (Blueprint $table) {
            $table->id('imagesID');
            $table->foreignId('metaID')->nullable()->constrained('tb-metadata', 'metaID');
            $table->foreignId('productID')->nullable()->constrained('tb-product', 'productID');
            $table->integer('orderNumber');
            $table->text('imageTitle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
