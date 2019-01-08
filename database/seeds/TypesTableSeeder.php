<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'description' => 'Catálogo',
            'return_deadline' => 3,
            'increase' => 0.00,
        ]);
        Type::create([
            'description' => 'Lançamento',
            'return_deadline' => 1,
            'increase' => 0.50,
        ]);
    }
}
