<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zip_codes', function (Blueprint $table): void {
            $table->id();
            $table->string('zip_code');
            $table->string('locality');
            $table->foreignId('federal_entity_id')->constrained('federal_entities');
            $table->foreignId('settlement_id')->constrained('settlements');
            $table->foreignId('municipality_id')->constrained('municipalities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zip_codes');
    }
};
