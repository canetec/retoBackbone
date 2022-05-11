<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\BelongsToZipCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ZipCode extends Model
{
    use BelongsToZipCodes;
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'locality',
    ];

    /**
     * @return HasOne<FederalEntity>
     */
    public function federalEntity(): HasOne
    {
        return $this->hasOne(FederalEntity::class);
    }

    /**
     * @return HasMany<Settlement>
     */
    public function settlements(): HasMany
    {
        return $this->hasMany(Settlement::class);
    }

    /**
     * @return HasOne<Municipality>
     */
    public function municipality(): HasOne
    {
        return $this->hasOne(Municipality::class);
    }
}
