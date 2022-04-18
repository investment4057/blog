<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Http\Requests\BlogRequest;

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

    // ブログ新規作成を表示
    public function showCreate() {
        return view('blog.form');
    }

    // ブログ登録
    public function exeStore(BlogRequest $request) {
        // ブログのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // ブログを登録
            Blog::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを登録しました');
        return redirect(route('blogs'));
    }
}