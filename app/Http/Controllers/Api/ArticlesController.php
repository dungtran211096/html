<?php
namespace App\Http\Controllers\Api;

use App\Article;
use App\ArticleCategoryRelation;
use App\ArticleCategory;
use App\Http\Requests\Api\ArticleRequest;
use App\Transformer\ArticleTransformer;
use Illuminate\Http\Request;

class ArticlesController extends ApiController
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $articles = Article::paginate($perPage);
        return $this->response(new ArticleTransformer($articles));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return $this->response(new ArticleTransformer($article));
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        $this->addCategories($article['id'], $request->get('categories', []));
        return $this->responseNoContent();
    }

    private function addCategories($articleId, $categoryIds)
    {
        foreach ($categoryIds as $id) {
            ArticleCategoryRelation::create([
                'article_id' => $articleId,
                'article_category_id' => $id
            ]);
        }
    }

    public function active($id)
    {
        $this->activeArticle($id);
        return $this->responseNoContent();
    }

    public function actives(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $this->activeArticle($id);
        }
        return $this->responseNoContent();
    }

    private function activeArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->update([
            'active' => $article['active'] ? 0 : 1
        ]);
    }

    public function update($id, ArticleRequest $request)
    {
        Article::findOrFail($id)->update($request->all());
        ArticleCategory::where('article_id', $id)->delete();
        $this->addCategories($id, $request->get('categories', []));
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        Article::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function destroys(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            Article::findOrFail($id)->delete();
        }
        return $this->responseNoContent();
    }
}