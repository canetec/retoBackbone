<?php

declare(strict_types=1);

use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
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
            $table->string('zip_code')->unique();
            $table->string('locality');
            $table->foreignIdFor(FederalEntity::class)->constrained();
            $table->foreignIdFor(Settlement::class)->constrained();
            $table->foreignIdFor(Municipality::class)->constrained();
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
