<?php
namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Requests\Api\UserRequest;
use App\Transformer\UserTransformer;
use Illuminate\Http\Request;

class UsersController extends ApiController
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage');
        $users = User::paginate($perPage);
        return $this->response(new UserTransformer($users));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->response(new UserTransformer($user));
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->except('data'));
        $user->newData = $request->get('data');
        return $this->responseNoContent();
    }

    public function update($id, UserRequest $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->except('data'));
        $user->newData = $request->get('data');
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function destroys(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            User::findOrFail($id)->delete();
        }
        return $this->responseNoContent();
    }

    public function active($id)
    {
        $this->activeUser($id);
        return $this->responseNoContent();
    }

    public function actives(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $this->activeUser($id);
        }
        return $this->responseNoContent();
    }

    private function activeUser($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'active' => $user['active'] ? 0 : 1
        ]);
    }
}