<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)
            ->has(Post::factory()->count(30)
                ->has(Comment::factory()->state(
                    function (array $_attributes, Post $post) {
                        return ['user_id' => $post->user_id];
                    }
                )->count(3)))->create();

        User::factory()->create([
            'name' => 'Tester',
            'email' => 'dev@modanpost.jp',
            "password" => Hash::make("spysecret"),
        ]);
    }
}
