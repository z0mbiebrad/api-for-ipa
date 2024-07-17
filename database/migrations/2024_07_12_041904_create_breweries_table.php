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
        Schema::create('breweries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text("brew_id")->nullable();
            $table->text("name")->nullable();
            $table->text("city")->nullable();
            $table->text("country")->nullable();
            $table->text("phone")->nullable();
            $table->text("website_url")->nullable();
            $table->text("state")->nullable();
            $table->text("street")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breweries');
    }
};
