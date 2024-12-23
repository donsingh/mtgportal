<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use Illuminate\Console\Command;
use App\Models\Set;
use App\DTO\Card;

class FetchCards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-cards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $url = "http://api.magicthegathering.io/v1/cards";
        $sets = array_keys(Set::getSetIdMap());
        foreach (array_slice($sets, 0, 5) as $set_code) {
            echo "Fetching cards for set {$set_code}\n";
            $response = Http::get($url, ['set' => $set_code]);
            $cards = $response->json()['cards'];
            $count = 0;
            foreach ($cards as $card) {
                echo "\tSaving card {$card['name']}\n";
                $data = Card::from($card);
                $data->save();
                $count++;
            }
            echo "Done fetching cards for set {$set_code}. Saved {$count} cards\n";
        }
    }
}
