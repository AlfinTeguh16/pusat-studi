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
        Schema::create('tb-manufacture', function (Blueprint $table) {
            $table->id('manufactureID');
            $table->foreignId('metaID')->nullable()->constrained('tb-metadata', 'metaID');
            $table->integer('orderNumber');
            $table->year('manufactureYear');
            $table->date('manufactureStart');
            $table->date('manufactureFinish');
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
