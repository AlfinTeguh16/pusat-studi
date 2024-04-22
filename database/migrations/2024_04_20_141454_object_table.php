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
        Schema::create('tb-object', function (Blueprint $table) {
            $table->id('objectID');
            $table->foreignId('metaID')->nullable()->constrained('tb-metadata', 'metaID');
            $table->integer('orderNumber');
            $table->string('objectOrnament')->nullable();
            $table->float('objectWidth')->nullable();
            $table->float('objectHeight')->nullable();
            $table->float('objectVolume')->nullable();
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
