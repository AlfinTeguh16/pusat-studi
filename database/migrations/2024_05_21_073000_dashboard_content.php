<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tb_dashboard_content", function (Blueprint $table) {
            $table->id();
            $table->text("image");
            $table->text("imageDescription")->nullable();
            $table->string("team")->default("0");
            $table->enum("imgtype", ["carousel", "gallery", "team", "about"]);
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
