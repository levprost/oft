<?php

namespace App\Http\Controllers\API;

use App\Models\Media;
use App\Models\Place;
use App\Models\Article;
use App\Enums\ArticleEnum;
use Illuminate\Http\Request;
use PhpParser\Builder\Enum_;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return response()->json($articles);
    }


    public function last()
    {
        $lastArticle = Article::latest()->first();
        return response()->json($lastArticle);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = new Article();
        $formFields = $request->validate([
            'title_article' => 'required|string',
            'content_article' => 'required|string',
            'type_article' => ['required', new Enum(ArticleEnum::class)],
            'content2_article' => 'required|string',
            'section_article' => 'required|string',
        ]);
        $article->fill($formFields);
        $article->save();
        return response()->json($article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if ($media = Media::where('article_id', $article->id)->get('media')) {
            return response()->json([
                'article' => $article,
                'media' => $media
            ]);
        } else {
            return response()->json($article);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $formFields = $request->validate([
            'title_article' => 'required|string',
            'content_article' => 'required|string',
            'type_article' => ['required', new Enum(ArticleEnum::class)],
            'content2_article' => 'required|string',
            'section_article' => 'required|string',
        ]);
        $article->fill($formFields);
        $article->save();
        return response()->json($article);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete related media
        Media::where('article_id', $article->id)->delete();

        // Delete related places
        Place::where('article_id', $article->id)->delete();

        // Delete the article
        $article->delete();

        return response()->json('Article and related media deleted');
    }
}
