<?php
namespace App\Http\Controllers\Api;

use App\ArticleCategory;
use App\Http\Requests\Api\ArticleCategoryRequest;
use App\Transformer\ArticleCategoryTransformer;
use Illuminate\Http\Request;

class ArticleCategoriesController extends ApiController
{
    public function index()
    {
        $categories = ArticleCategory::all();
        $transformer = new ArticleCategoryTransformer($categories);
        return response($this->sortCategory($transformer->result()), 200);
    }

    public function show($id)
    {
        $category = ArticleCategory::findOrFail($id);
        return $this->response(new ArticleCategoryTransformer($category));
    }

    public function store(ArticleCategoryRequest $request)
    {
        $category = ArticleCategory::create($request->all());
        return $this->response(new ArticleCategoryTransformer($category));
    }

    public function update($id, ArticleCategoryRequest $request)
    {
        $parent = $request->get('parent', 0);
        while ($parent) {
            if ($parent == $id) {
                return $this->errorInvalid([
                    'message' => ['Danh Mục không thể thuộc chính nó']
                ]);
            }
            $parent = ArticleCategory::findOrFail($parent)->parent;
        }
        ArticleCategory::findOrFail($id)->update($request->all());
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        ArticleCategory::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function active($id)
    {
        $cat = ArticleCategory::findOrFail($id);
        $cat->update([
            'active' => $cat['active'] ? 0 : 1
        ]);
        return response($cat['active'], 200);
    }

    public function actives(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $this->activeCategory($id);
        }
        return $this->responseNoContent();
    }

    public function destroys(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $category = ArticleCategory::find($id);
            if ($category) {
                $category->delete();
            }
        }
        return $this->responseNoContent();
    }

    private function activeCategory($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $category->update([
            'active' => $category['active'] ? 0 : 1
        ]);
    }

    private function sortCategory($categories, $parent = 0, $a = [])
    {
        if (count($categories)) {
            foreach ($categories as $key => $category) {
                if ($category['parent'] == $parent) {
                    $a[] = $category;
                    unset($categories[$key]);
                    return $this->sortCategory($categories, $category['id'], $a);
                }
            }
            foreach ($a as $b) {
                if ($b['id'] == $parent) {
                    return $this->sortCategory($categories, $b['parent'], $a);
                }
            }
        }
        return $a;
    }
}