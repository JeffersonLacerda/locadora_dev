<?php

use Illuminate\Database\Seeder;
use App\Models\Media;

class MediasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Media::create([
            'description' => 'VHS',
            'rental_price' => 5.00,
        ]);
        Media::create([
            'description' => 'DVD',
            'rental_price' => 5.00,
        ]);
        Media::create([
            'description' => 'HD-DVD',
            'rental_price' => 5.00,
        ]);
        Media::create([
            'description' => 'Blu-Ray',
            'rental_price' => 7.50,
        ]);
    }
}
