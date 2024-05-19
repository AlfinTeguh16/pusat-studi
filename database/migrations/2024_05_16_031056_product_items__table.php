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
        Schema::create('tb_products_items', function(Blueprint $table){
            $table->id();
            $table->foreignId('products_id')->constrained('tb_products');
            $table->string('jenis');
            $table->text('content')->nullable();
            $table->text('media')->nullable();;
            $table->integer('order');
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
