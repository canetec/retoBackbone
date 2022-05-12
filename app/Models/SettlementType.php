<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SettlementType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function settlements(): BelongsToMany
    {
        return $this->belongsToMany(Settlement::class);
    }
}
