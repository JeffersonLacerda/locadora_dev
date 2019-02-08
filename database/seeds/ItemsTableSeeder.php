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
            $d1 = random_int(1, 6);
            $d2 = random_int(7, 9);
            if ($m->year < 2000) {
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                    'distributor_id' => $d2,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                    'distributor_id' => $d2,
                ]);
            } elseif ($m->year < 2010){
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 1,
                    'distributor_id' => $d2,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                    'distributor_id' => $d1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                    'distributor_id' => $d1,
                ]);
            } else {
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 2,
                    'distributor_id' => $d1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 3,
                    'distributor_id' => $d1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 4,
                    'distributor_id' => $d1,
                ]);
                Item::create([
                    'serial_number' => Keygen::numeric(20)->generate(),
                    'purchase_date' => '2019-01-02',
                    'movie_id' => $m->id,
                    'media_id' => 4,
                    'distributor_id' => $d1,
                ]);
            }
        }
    }
}
