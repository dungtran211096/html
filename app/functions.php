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
        $a = @unserialize($option->value);
        if ($a || is_array($a)) {
            return $a;
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