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
        Schema::create('tb-creator', function (Blueprint $table) {
            $table->id('creatorID');
            $table->foreignId('metaID')->nullable()->constrained('tb-metadata', 'metaID');
            $table->integer('orderNumber');
            $table->string('creatorName')->nullable();
            $table->string('creatorNationality')->nullable();
            $table->string('creatorStyle')->nullable();
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
