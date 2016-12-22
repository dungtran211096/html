<?php
function getOption($name, $default = '')
{
    $option = \App\Option::where('name', $name)->first();
    if (!$option) {
        \App\Option::create([
            'name' => $name
        ]);
        return $default;
    } else {
        if (@unserialize($option->value)) {
            return unserialize($option->value);
        }
        return $option->value;
    }
}

function isLogin()
{
    return \Illuminate\Support\Facades\Auth::user();
}

function getDocuments($perPage = 24, $order = 'orderDate', $cat = null)
{
    if ($cat) {
        return $cat->documents()->active()->$order()->paginate($perPage);
    }
    return \App\Document::active()->orderDate()->paginate($perPage);
}

function getDocumentId($link)
{
    $a = explode('/', $link);

    return isset($a[5]) ? $a[5] : null;
}