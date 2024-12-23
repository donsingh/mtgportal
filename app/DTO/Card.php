<?php

namespace App\DTO;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapInputName;
use App\Models\Card as CardModel;

class Card extends Data
{
    public function __construct(
        public string $id,
        public string $name,
        #[MapInputName('manaCost')]
        public string $mana_cost,
        public string $rarity,
        public string $set,
        #[MapInputName('imageUrl')]
        public ?string $image_url,
    ) {}

    public function save()
    {
        CardModel::saveDTO($this);   
    }
}