<?php
namespace App\Http\Controllers\Api;

use App\_REPLACE_oc;
use App\_REPLACE_ocCategoryRelation;
use App\_REPLACE_ocCategory;
use App\Http\Requests\Api\_REPLACE_ocRequest;
use App\Transformer\_REPLACE_ocTransformer;
use Illuminate\Http\Request;

class _REPLACE_mcController extends ApiController
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $_REPLACE_m = _REPLACE_oc::paginate($perPage);
        return $this->response(new _REPLACE_ocTransformer($_REPLACE_m));
    }

    public function show($id)
    {
        $_REPLACE_o = _REPLACE_oc::findOrFail($id);
        return $this->response(new _REPLACE_ocTransformer($_REPLACE_o));
    }

    public function store(_REPLACE_ocRequest $request)
    {
        $_REPLACE_o = _REPLACE_oc::create($request->all());
        $this->addCategories($_REPLACE_o['id'], $request->get('categories', []));
        return $this->responseNoContent();
    }

    private function addCategories($_REPLACE_oId, $categoryIds)
    {
        foreach ($categoryIds as $id) {
            _REPLACE_ocCategoryRelation::create([
                '_REPLACE_o_id' => $_REPLACE_oId,
                '_REPLACE_o_category_id' => $id
            ]);
        }
    }

    public function active($id)
    {
        $this->active_REPLACE_oc($id);
        return $this->responseNoContent();
    }

    public function actives(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $this->active_REPLACE_oc($id);
        }
        return $this->responseNoContent();
    }

    private function active_REPLACE_oc($id)
    {
        $_REPLACE_o = _REPLACE_oc::findOrFail($id);
        $_REPLACE_o->update([
            'active' => $_REPLACE_o['active'] ? 0 : 1
        ]);
    }

    public function update($id, _REPLACE_ocRequest $request)
    {
        _REPLACE_oc::findOrFail($id)->update($request->all());
        _REPLACE_ocCategory::where('_REPLACE_o_id', $id)->delete();
        $this->addCategories($id, $request->get('categories', []));
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        _REPLACE_oc::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function destroys(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            _REPLACE_oc::findOrFail($id)->delete();
        }
        return $this->responseNoContent();
    }
}