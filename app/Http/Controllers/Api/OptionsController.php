<?php
namespace App\Http\Controllers\Api;

use App\Option;
use Illuminate\Http\Request;

class OptionsController extends ApiController
{
    public function index()
    {
        $options = Option::all();
        $rs = null;
        if ($options) {
            foreach ($options as $option) {
                $rs[$option['name']] = $this->getValue($option);
            }
        }
        return response([
            'data' => $rs
        ]);
    }

    public function save(Request $request)
    {
        foreach ($request->all() as $name => $value) {
            $option = Option::name($name)->first();
            if (!$option) {
                $option = Option::create([
                    'name' => $name
                ]);
            }
            $this->updateOption($option, $value);
        }
        return $this->responseNoContent();
    }

    public function show($name)
    {
        $option = Option::name($name)->first();
        if ($option) {
            return response($this->getValue($option));
        }
        return $this->errorNotFound();
    }

    public function update($name, Request $request)
    {
        $option = Option::name($name)->first();
        if ($option) {
            $value = $request->get('value', '');
            $this->updateOption($option, $value);
            return $this->responseNoContent();
        }
        return $this->errorNotFound();
    }

    private function updateOption($option, $value)
    {
        if (is_array($value)) {
            $value = serialize($value);
        }
        $option->update([
            'value' => $value
        ]);
    }

    private function getValue($option)
    {
        if (@unserialize($option['value'])) {
            return unserialize($option['value']);
        }
        return $option['value'];
    }
}