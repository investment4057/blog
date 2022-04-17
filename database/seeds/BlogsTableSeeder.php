<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   // 2つ目の引数で15個生成
        factory(Blog::class, 15)->create();
    }
}