<?php

namespace App\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use App\Models\Set as SetModel;


class Set extends Data
{
    public function __construct(
        public string $code,
        public string $name,
        #[MapInputName('releaseDate')]
        public string $release_date,
    ) {}

    public function save()
    {
        SetModel::saveDTO($this);
    }
}