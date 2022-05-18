<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Settlement;
use App\Models\SettlementType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\ZipCode */
class ZipCodeResource extends JsonResource
{
    public static $wrap = false;

    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        $federalEntity = $this->federalEntity;

        return [
            'zip_code' => $this->zip_code,
            'locality' => Str::of($this->locality)->ascii()->upper(),
            'federal_entity' => [
                'key' => $federalEntity->id,
                'name' => Str::of($federalEntity->name)->ascii('')->upper(),
                'code' => null,
            ],
            'settlements' => collect([$this->settlement])->map(function (Settlement $settlement) {
                return [
                    'key' => $settlement->id,
                    'name' => Str::upper($settlement->name),
                    'zone_type' => Str::upper($settlement->zone_type),
                    'settlement_type' => [
                        'name' => SettlementType::find($settlement->settlement_type_id)->name,
                    ],
                ];
            }),
            'municipality' => [
                'key' => $this->municipality->id,
                'name' => Str::of($this->municipality->name)->ascii()->upper(),
            ],
        ];
    }
}
