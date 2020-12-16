<?php

use App\Article;
use Illuminate\Http\Request;

Route::group(['prefix' => 'articles'], function () {
    /**
     *Вывести панель статей
     */
    Route::get('/', function () {
        $articles = Article::orderBy('created_at', 'asc')->get();

        return view('articles.index', [
            'articles' => $articles
        ]);

    })->name('articles.all');

    /**
     *Добавить новую статью
     */
    Route::post('/', function (Request $request) {
        $validator = Validator::make($request->all(),
            [
                'title' => 'required|max:255',
                'description' => 'required'
            ]);
        if ($validator->fails()) {
            return redirect(route('articles.all'))
                ->withInput()
                ->withErrors($validator); //для вывода ошибок
        }
        $title = $request->title;
        $description = $request->description;
        //через create ask =========
//        Article::create([['title'=>$title,'description'=>$description]);
        //========================
        $article = new Article();
        $article->title = $title;
        $article->description = $description;
        $article->save();
        return redirect(route('articles.all'));
    })->name('article.add');

    /**
     *Удалить статью
     */
    Route::delete('/{article}', function (Article $article) {
        $article->delete();
        return redirect(route('articles.all'));
    })->name('article.delete');

    /**
     *Вывести текст статьи
     */
    Route::get('/{article}', function (Article $article) {
        return view('article.article', [
            'article' => $article
        ]);

    })->name('article.show');
});

