<?php
namespace App\Http\Controllers\Api;

use App\School;
use App\Http\Requests\Api\SchoolRequest;
use App\Transformer\SchoolTransformer;
use Illuminate\Http\Request;

class SchoolsController extends ApiController
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage');
        $schools = School::paginate($perPage);
        return $this->response(new SchoolTransformer($schools));
    }

    public function show($id)
    {
        $school = School::findOrFail($id);
        return $this->response(new SchoolTransformer($school));
    }

    public function store(SchoolRequest $request)
    {
        School::create($request->all());
        return $this->responseNoContent();
    }

    public function update($id, SchoolRequest $request)
    {
        School::findOrFail($id)->update($request->all());
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        School::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function destroys(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            School::findOrFail($id)->delete();
        }
        return $this->responseNoContent();
    }
    public function active($id)
    {
        $this->activeSchool($id);
        return $this->responseNoContent();
    }

    public function actives(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $this->activeSchool($id);
        }
        return $this->responseNoContent();
    }

    private function activeSchool($id)
    {
        $school = School::findOrFail($id);
        $school->update([
            'active' => $school['active'] ? 0 : 1
        ]);
    }
}