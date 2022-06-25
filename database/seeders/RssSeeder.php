<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rss;

class RssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rss::create([
            'name' => 'The Apology Line',
            'url' => "https://rss.art19.com/apology-line"
        ]);
        Rss::create([
            'name' => 'The Daily by The New York Times',
            'url' => 'https://feeds.simplecast.com/54nAGcIl'
        ]);
        Rss::create([
            'name' => 'Crime Junkie',
            'url' => 'https://feeds.simplecast.com/qm_9xx0g'
        ]);

    }
}
