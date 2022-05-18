<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ZipCodeResource;
use App\Models\ZipCode;
use Illuminate\Http\Resources\Json\JsonResource;

class ZipCodeController extends Controller
{
    public function show(ZipCode $zipCode): JsonResource
    {
        return new ZipCodeResource($zipCode);
    }
}
