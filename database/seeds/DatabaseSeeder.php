<?php

use App\User;
use App\Model\Tag;
use App\Model\Post;
use App\Model\PostTag;
use App\Model\Setting;
use App\Model\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'iwanli',
            'password' => bcrypt('123123')
        ]);

        factory(Category::class,4)->create()->each(function($category) use ($user){
            factory(Post::class, 10)->create([
                'user_id' => $user->id,
                'category_id' => $category->id,
            ])->each(function($post){
                factory(Tag::class, rand(2,4))->create()->each(function($tag) use ($post){
                    PostTag::create([
                        'post_id' => $post->id,
                        'tag_id' => $tag->id,
                    ]);
                });
            });
        });

        factory(Setting::class)->create();
    }
}
