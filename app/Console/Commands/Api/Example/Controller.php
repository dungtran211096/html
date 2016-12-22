<?php
namespace App\Http\Controllers\Api;

use App\_REPLACE_oc;
use App\Http\Requests\Api\_REPLACE_ocRequest;
use App\Transformer\_REPLACE_ocTransformer;
use Illuminate\Http\Request;

class _REPLACE_mcController extends ApiController
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage');
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
        _REPLACE_oc::create($request->all());
        return $this->responseNoContent();
    }

    public function update($id, _REPLACE_ocRequest $request)
    {
        _REPLACE_oc::findOrFail($id)->update($request->all());
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
}