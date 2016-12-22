<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transformer\Transformer;

class ApiController extends Controller
{
    protected function response(Transformer $data)
    {
        return response($data->result(), 200);
    }

    protected function errorNotFound($message = null)
    {
        return response($message, 404);
    }

    protected function errorInvalid($message = null)
    {
        return response($message, 422);
    }

    protected function errorInternalError()
    {
        return response('', 500);
    }

    protected function errorAuthenticationFailed()
    {
        return response('', 403);
    }

    protected function responseNoContent()
    {
        return response('', 204);
    }
}