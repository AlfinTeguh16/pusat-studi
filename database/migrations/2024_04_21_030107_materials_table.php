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
        Schema::create('tb-materials', function (Blueprint $table) {
            $table->id('materialsID');
            $table->foreignId('metaID')->constrained('tb-metadata', 'metaID');
            $table->integer('orderNumber');
            $table->string('mainMaterial')->nullable();
            $table->string('additionalMaterial')->nullable();
            $table->string('creationTechnique')->nullable();
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
