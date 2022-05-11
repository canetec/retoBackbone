<?php

declare(strict_types=1);

namespace App\Models;

use App\Traits\BelongsToZipCodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use BelongsToZipCodes;
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
}
