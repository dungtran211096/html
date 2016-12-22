<?php
namespace App\Http\Controllers\Api;

use App\_REPLACE_ocCategory;
use App\Http\Requests\Api\_REPLACE_ocCategoryRequest;
use App\Transformer\_REPLACE_ocCategoryTransformer;
use Illuminate\Http\Request;

class _REPLACE_ocCategoriesController extends ApiController
{
    public function index()
    {
        $categories = _REPLACE_ocCategory::all();
        $transformer = new _REPLACE_ocCategoryTransformer($categories);
        return response($this->sortCategory($transformer->result()), 200);
    }

    public function show($id)
    {
        $category = _REPLACE_ocCategory::findOrFail($id);
        return $this->response(new _REPLACE_ocCategoryTransformer($category));
    }

    public function store(_REPLACE_ocCategoryRequest $request)
    {
        $category = _REPLACE_ocCategory::create($request->all());
        return $this->response(new _REPLACE_ocCategoryTransformer($category));
    }

    public function update($id, _REPLACE_ocCategoryRequest $request)
    {
        $parent = $request->get('parent', 0);
        while ($parent) {
            if ($parent == $id) {
                return $this->errorInvalid([
                    'message' => ['Danh Mục không thể thuộc chính nó']
                ]);
            }
            $parent = _REPLACE_ocCategory::findOrFail($parent)->parent;
        }
        _REPLACE_ocCategory::findOrFail($id)->update($request->all());
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        _REPLACE_ocCategory::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function active($id)
    {
        $cat = _REPLACE_ocCategory::findOrFail($id);
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
            $category = _REPLACE_ocCategory::find($id);
            if ($category) {
                $category->delete();
            }
        }
        return $this->responseNoContent();
    }

    private function activeCategory($id)
    {
        $category = _REPLACE_ocCategory::findOrFail($id);
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