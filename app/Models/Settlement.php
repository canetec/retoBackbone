<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\BelongsToZipCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Settlement extends Model
{
    use BelongsToZipCodes;
    use HasFactory;

    protected $fillable = [
        'name',
        'zone_type',
        'settlement_type',
    ];

    /**
     * @return BelongsToMany<ZipCode>
     */
    public function zipCodes(): BelongsToMany
    {
        return $this->belongsToMany(ZipCode::class);
    }
}