<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::upsert([
            ['name' => Category::LIGHT],
            ['name' => Category::FRAGILE],
            ['name' => Category::HEAVY],
        ], ['name']);
    }
}
