<?php

namespace Database\Seeders;

use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostStatus::insert([
            ['name' => 'Publicado'],
            ['name' => 'Borrador'],
            ['name' => 'Cerrado'],
        ]);
    }
}
