<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\DTO\ImportedZipCode;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImportZipCodesCommand extends Command
{
    protected $signature = 'codes:import';

    protected $description = 'Import Zip Codes from Excel spreadsheet';

    public function handle(): int
    {
        $zipCodes = $this->zipCodes();

        $this->withProgressBar(
            $zipCodes,
            function (ImportedZipCode $zipCode): void {
                $federalEntity = FederalEntity::firstOrCreate(['id' => $zipCode->c_estado], ['name' => self::removeTildes($zipCode->d_estado)]);
                $municipality = Municipality::firstOrCreate(['id' => $zipCode->c_mnpio], ['name' => self::removeTildes($zipCode->D_mnpio)]);

                $settlementType = SettlementType::firstOrCreate(['name' => $zipCode->d_tipo_asenta]);

                $settlement = Settlement::firstOrCreate([
                    'id' => $zipCode->id_asenta_cpcons,
                ], [
                    'name' => self::removeTildes($zipCode->d_asenta),
                    'zone_type' => self::removeTildes($zipCode->d_zona),
                    'settlement_type_id' => $settlementType->id,
                ]);

                ZipCode::create([
                    'zip_code' => $zipCode->d_codigo,
                    'locality' => self::removeTildes($zipCode->d_ciudad),
                    'federal_entity_id' => $federalEntity->id,
                    'settlement_id' => $settlement->id,
                    'municipality_id' => $municipality->id,
                ]);
            }
        );

        return self::SUCCESS;
    }

    private static function removeTildes(string $string): string
    {
        $characters = str_split($string);
        $ords = array_map(fn (string $char): int => \ord($char), $characters);
        $characters = array_map(function (int $ord): string {
            $ordMapping = [
                225 => 97,
                233 => 101,
                237 => 105,
                243 => 111,
                250 => 117,
                241 => 110,
                193 => 65,
                201 => 69,
                205 => 73,
                211 => 79,
                218 => 85,
                209 => 78,
            ];

            if (isset($ordMapping[$ord])) {
                return \chr($ordMapping[$ord]);
            }

            return \chr($ord);
        }, $ords);

        return implode('', $characters);
    }

    /**
     * @return array<ImportedZipCode>
     */
    private function zipCodes(): array
    {
        return Str::of(File::get(storage_path('app/public/CPdescarga.txt')))
            ->explode(PHP_EOL)
            // Skip first two lines
            ->slice(2)
            ->filter(fn (string $line) => '' !== $line)
            ->values()
            // Create array on each line
            ->map(fn (string $line): array => explode('|', $line))
            // Map each header to its DTO
            ->map(fn (array $values): ImportedZipCode => ImportedZipCode::fromArray($values))
            ->toArray()
        ;
    }
}
