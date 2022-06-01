<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
        User::create([
            'name' => 'Helmy fadlail',
            'username' => 'helmy',
            'email' => 'helmyfadlail.5@gmail.com',
            'phone' => '+62813013968',
            'password' => bcrypt('helmy4321')
        ]);
        User::factory(2)->create();

        Category::create([
            'name'=>'Progamming',
            'slug'=>'progamming'
        ]);
        Category::create([
            'name'=>'Web Design',
            'slug'=>'web-design'
        ]);
        Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        Post::factory(40)->create();
    }
}
