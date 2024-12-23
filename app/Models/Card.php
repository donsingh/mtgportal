<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Set;
use App\DTO\Card as CardDTO;

class Card extends Model
{
    public $incrementing = false;

    protected $keyType = 'string';

    public function set(): BelongsTo
    {
        return $this->belongsTo(Set::class);
    }

    public static function saveDTO(CardDTO $card): void
    {
        $set_map = Set::getSetIdMap();
        $set_id = $set_map[$card->set] ?? null;
        if (! $set_id) {
            throw new Exception("Set {$card->set} not found in our database");
        }
        static::upsert(
            [
                'id' => $card->id,
                'set_id' => $set_id,
                'name' => $card->name,
                'mana_cost' => $card->mana_cost,
                'rarity' => $card->rarity,
                'image_url' => $card->image_url,
            ],
            uniqueBy: ['id'],
            update: ['name', 'mana_cost', 'rarity', 'image_url']
        );
    }

}
