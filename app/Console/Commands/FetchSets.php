<?php

namespace App\Console\Commands;

use Http;
use Illuminate\Console\Command;
use App\DTO\Set;

class FetchSets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-sets';

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
        $url = "http://api.magicthegathering.io/v1/sets";
        $response = Http::get($url);
        $sets = $response->json()['sets'];
        
        $counter = 0;
        foreach($sets as $set) {
            if ($set['onlineOnly']) {
                continue;
            }
            $data = Set::from($set);
            $data->save();
            $counter++;
        }

        echo "Saved $counter sets\n";
    }
}
