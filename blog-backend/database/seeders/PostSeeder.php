<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //User::factory(count:3)->has(Post::factory()->count(4))->create();
    User::factory(count:3)->has(Post::factory()->count(4))->create();
    }
}
