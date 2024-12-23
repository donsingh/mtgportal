<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Redis;
use App\DTO\Set as SetDTO;
use App\Models\Card;

class Set extends Model
{
    public static function saveDTO(SetDTO $set)
    {
        static::upsert(
            $set->toArray(),
            uniqueBy: ['code'],
            update: ['name', 'release_date']
        );
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public static function getSetIdMap(): array
    {
        $map = Redis::get('set_id_map');
        if ($map) {
            return json_decode($map, true);
        }
        $map = static::orderBy('release_date')->pluck('id', 'code')->toArray();
        Redis::set('set_id_map', json_encode($map));
        return $map;
    }
}
