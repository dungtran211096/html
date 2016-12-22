<?php
namespace App\Http\Controllers\Api;

use App\Question;
use App\Http\Requests\Api\QuestionRequest;
use App\Transformer\QuestionTransformer;
use Illuminate\Http\Request;

class QuestionsController extends ApiController
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage');
        $questions = Question::paginate($perPage);
        return $this->response(new QuestionTransformer($questions));
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return $this->response(new QuestionTransformer($question));
    }

    public function store(QuestionRequest $request)
    {
        Question::create($request->all());
        return $this->responseNoContent();
    }

    public function update($id, QuestionRequest $request)
    {
        Question::findOrFail($id)->update($request->all());
        return $this->responseNoContent();
    }

    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return $this->responseNoContent();
    }

    public function destroys(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            Question::findOrFail($id)->delete();
        }
        return $this->responseNoContent();
    }
    public function active($id)
    {
        $this->activeQuestion($id);
        return $this->responseNoContent();
    }

    public function actives(Request $request)
    {
        $ids = $request->get('ids', []);
        foreach ($ids as $id) {
            $this->activeQuestion($id);
        }
        return $this->responseNoContent();
    }

    private function activeQuestion($id)
    {
        $question = Question::findOrFail($id);
        $question->update([
            'active' => $question['active'] ? 0 : 1
        ]);
    }
}