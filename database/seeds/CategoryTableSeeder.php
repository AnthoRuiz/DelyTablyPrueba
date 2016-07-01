<?php

use henfayer\Category;
use henfayer\Content;
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

        factory(henfayer\Category::class, 20)->create()->each(function ($category) {
            $contents = Content::all();
            $number = mt_rand(3,17);
            if($number == 0){
                $category->contents()->save($contents->get(7));
            }else{
                $category->contents()->save($contents->get($number));
            }
        });
    }
}
