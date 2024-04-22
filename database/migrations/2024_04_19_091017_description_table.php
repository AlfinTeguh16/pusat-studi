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
        Schema::create('tb-description', function (Blueprint $table) {
            $table->id('descriptionID');
            $table->foreignId('metaID')->nullable()->constrained('tb-metadata', 'metaID');
            $table->foreignId('productID')->nullable()->constrained('tb-product', 'productID');
            $table->integer('orderNumber');
            $table->text('description');
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
