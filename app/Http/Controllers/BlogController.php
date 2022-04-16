<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    // ブログ一覧を表示
    public function showList() {
        return view('blog.list');
    }
}