<?php

use future\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        factory(future\Category::class)->create([
            'nombre' => 'HOMBRE',
        ]);

        factory(future\Category::class)->create([
            'nombre' => 'FAMILIA',
        ]);

        factory(future\Category::class)->create([
            'nombre' => 'MUJER',
        ]);

    }
}
