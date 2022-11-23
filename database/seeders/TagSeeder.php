<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::insert([
            ['name' => 'css'],
            ['name' => 'html'],
            ['name' => 'javascript'],
            ['name' => 'flutter'],
            ['name' => 'laravel'],
            ['name' => 'java'],
            ['name' => 'python'],
        ]);
    }
}
