<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('authors')->truncate();
        DB::table('categories')->truncate();
        DB::table('tags')->truncate();
        DB::table('posts')->truncate();
        DB::table('post_tag')->truncate();

        for ($i = 0; $i < 5; $i++) {
            DB::table('authors')->insert([
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl,
                
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => fake()->realText(50)
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('tags')->insert([
                'name' => fake()->realText(50)
            ]);
       }
       $data = [];
        for ($i = 1; $i < 21; $i++) {
            $data[] = [
                'author_id' => rand(1, 5),
                'category_id' => rand(1, 10),
                'title' => fake()->text('100'),
                'excerpt' => fake()->text(),
                'img_thumnail' => fake()->imageUrl,
                'img_cover' => fake()->imageUrl,
                'content' => fake()->text(),
                'is_trending' => rand(0, 1),
                'view_count' => rand(100, 1000),
                'status' => 'published',
            ];

          
                DB::table('posts')->insert($data);

               
            
        }

        // $data = [];
        // for ($i = 1; $i < 250001; $i++) {
        //     $data[] = [
        //         'author_id' => rand(1, 5),
        //         'category_id' => rand(1, 10),
        //         'title' => fake()->text('100'),
        //         'excerpt' => fake()->text(),
        //         'img_thumbnail' => fake()->imageUrl,
        //         'img_cover' => fake()->imageUrl,
        //         'content' => fake()->text(),
        //         'is_trending' => rand(0, 1),
        //         'view_count' => rand(100, 1000),
        //         'status' => 'published',
        //     ];

        //     if ($i % 500 == 0) {
        //         DB::table('posts')->insert($data);

        //         $data = [];
        //     }
        // }

        // $data = [];
        // for ($i = 1; $i < 250001; $i++) {

        //     $data[] = ['post_id' => $i, 'tag_id' => rand(1, 5)];
        //     $data[] = ['post_id' => $i, 'tag_id' => rand(6, 10)];
        //     $data[] = ['post_id' => $i, 'tag_id' => rand(11, 15)];
        //     $data[] = ['post_id' => $i, 'tag_id' => rand(16, 20)];

        //     if ($i % 500 == 0) {
        //         DB::table('post_tag')->insert($data);
        //         $data = [];
        //     }
        // }
    }
}
