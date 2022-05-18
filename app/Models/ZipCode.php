<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\BelongsToZipCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ZipCode extends Model
{
    use BelongsToZipCodes;
    use HasFactory;

    protected $fillable = [
        'zip_code',
        'locality',
        'federal_entity_id',
        'settlement_id',
        'municipality_id',
    ];

    public function resolveRouteBinding($value, $field = null)
    {
        return self::firstWhere('zip_code', $value);
    }

    /**
     * @return BelongsTo<FederalEntity, ZipCode>
     */
    public function federalEntity(): BelongsTo
    {
        return $this->belongsTo(FederalEntity::class);
    }

    /**
     * @return BelongsTo<Settlement, ZipCode>
     */
    public function settlement(): BelongsTo
    {
        return $this->belongsTo(Settlement::class);
    }

    /**
     * @return BelongsTo<Municipality, ZipCode>
     */
    public function municipality(): BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
}
