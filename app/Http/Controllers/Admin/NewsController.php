<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでニュースモデルを扱うことができる
use App\News;

class NewsController extends Controller
{
    // 以下を追記
  public function add()
  {
      return view('admin.news.create');
  }
  
  public function create(Request $request)
  {
    // Validationを行う
    $this->validate($request, News::$rules);
    
    $news = new News;
    $form = $request->all();
    
    // フォームから画像が送信されていたら、保存し、$news->image_pathに画像のパスを保存する
    if (isset($form['image'])) {
      $path = $request->file('image')->store('public/image');
      $news->image_path = basename($path);
    } else {
      $news->image_path = null;
    }
    
    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    // フォームから送信されてきたイメージを削除する
    unset($form['image']);
    
    // データベースに保存する
    $news->fill($form);
    $news->save();
    //   admin/news/createにリダイレクトする
    return redirect('admin/news/create');
  }
}
