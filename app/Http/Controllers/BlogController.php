<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    // ブログ一覧を表示
    public function showList() {
        $blogs = Blog::all();

        // dd($blogs);

        return view('blog.list', ['blogs' => $blogs]);
    }

    // ブログ詳細を表示
    public function showDetail($id) {
        $blog = Blog::find($id);

        // IDが見つからなかった（$blogがnull）場合の分岐
        if (is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        return view('blog.detail', ['blog' => $blog]);
    }
}