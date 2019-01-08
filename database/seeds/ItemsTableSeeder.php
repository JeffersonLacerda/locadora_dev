<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Movie;
use \Keygen\Keygen;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::all();
        foreach ($movies as $m) {
            if ($m->year < 2001) {
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                ]);
            } elseif ($m->year < 2011){
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                ]);
            } else {
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 3,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 4,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 4,
                ]);
            }
        }
    }
}
