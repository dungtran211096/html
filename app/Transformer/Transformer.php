<?php
namespace App\Transformer;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Transformer
{
    protected $result = [];

    public function result()
    {
        return $this->result;
    }

    function __construct($data)
    {
        if ($data instanceof Collection) {
            $this->result = $this->collection($data);
        } elseif ($data instanceof LengthAwarePaginator) {
            $this->result = $this->paginate($data);
        } elseif ($data instanceof Model) {
            $this->result = $this->transform($data);
        } else {
            $this->result = 'Lỗi Không Thể Xác Nhận Kiểu Dữ Liệu';
        }
    }

    protected function allFillable($model)
    {
        $arr = [];
        foreach ($model->getFillable() as $key) {
            $arr[$key] = $model->$key;
        }
        $arr['updated_at'] = $model->updated_at->format('d/m/Y');
        $arr['id'] = $model->id;
        $arr['active'] = (bool)$model->active;
        unset($arr['password']);
        return $arr;
    }

    protected function transform($data)
    {
        return null;
    }

    private function collection(Collection $data)
    {
        $results = [];
        foreach ($data as $value) {
            $results[] = $this->transform($value);
        }
        return $results;
    }

    private function paginate(LengthAwarePaginator $data)
    {
        $results['meta'] = [
            'currentPage' => $data->currentPage(),
            'previousPageUrl' => $data->previousPageUrl(),
            'total' => $data->total(),
            'perPage' => $data['perPage'],
            'nextPageUrl' => $data['nextPageUrl'],
            'count' => $data->count(),
        ];

        foreach ($data as $value) {
            $results['data'][] = $this->transform($value);
        }
        return $results;
    }
}