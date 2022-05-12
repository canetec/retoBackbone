<?php

declare(strict_types=1);

namespace App\DTO;

class ImportedZipCode
{
    public function __construct(
        public readonly string $d_codigo,
        public readonly string $d_asenta,
        public readonly string $d_tipo_asenta,
        public readonly string $D_mnpio,
        public readonly string $d_estado,
        public readonly string $d_ciudad,
        public readonly string $d_CP,
        public readonly string $c_estado,
        public readonly string $c_oficina,
        public readonly string $c_CP,
        public readonly string $c_tipo_asenta,
        public readonly string $c_mnpio,
        public readonly string $id_asenta_cpcons,
        public readonly string $d_zona,
        public readonly string $c_cve_ciudad,
    ) {
    }

    public static function fromArray(array $array): static
    {
        return new static(...$array);
    }
}
