<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['General','Entertainment','Sport','Films','Politics','Cars'];

        foreach($categories as $category) {
            DB::table('categories')->insert([

                'category_name' => $category
    
            ]);
        }

    }
}
