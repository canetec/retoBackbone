<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToZipCodes
{
    /**
     * @return BelongsToMany<ZipCode>
     */
    public function zipCodes(): BelongsToMany
    {
        return $this->belongsToMany(ZipCode::class);
    }
}
