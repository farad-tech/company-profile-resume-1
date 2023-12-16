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
        Schema::create('header_sliders', function (Blueprint $table) {
            $table->id();
            $table->text('icon');
            $table->text('title');
            $table->text('CallToActionTitle');
            $table->text('CallToActionURL');
            $table->text('image');
            $table->text('imageAlt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_sliders');
    }
};
