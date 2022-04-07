<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
use Illuminate\Support\Arr;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();
        for($i = 0; $i<10; $i++){
            $post = new Post();
            $post->title = $faker->text(100);
            $post->content = $faker->paragraphs(3, true);
            $post->image = $faker->imageUrl(200, 200);
            $post->category_id = Arr::random($category_ids);
            $post->save();
        }
    }
}
