<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;

class CardController extends Controller
{

    public function index(Request $request)
    {
        $set = Set::orderBy('release_date')->first();
        $cards = $set->cards->take(15)->toArray();
        return [
            'cards' => $cards,
            'set' => $set->toArray()
        ];
    }
}
