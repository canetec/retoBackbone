<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ZipCodeResource;
use App\Models\ZipCode;

class ZipCodeController extends Controller
{
    public function show(ZipCode $zipCode)
    {
        return new ZipCodeResource($zipCode);
    }
}
