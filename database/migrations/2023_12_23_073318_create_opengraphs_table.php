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
        Schema::create('opengraphs', function (Blueprint $table) {
            $table->id();
            $table->string('og_title')->nullable()->default(null);
            $table->string('og_site_name')->nullable()->default(null);
            $table->string('og_url')->nullable()->default(null);
            $table->text('og_description')->nullable()->default(null);
            $table->string('og_type')->nullable()->default(null);
            $table->string('og_image')->nullable()->default(null);
            $table->string('page')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opengraphs');
    }
};
