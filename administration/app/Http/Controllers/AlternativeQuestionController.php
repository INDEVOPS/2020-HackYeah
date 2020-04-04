<?php

namespace App\Http\Controllers;

use App\Question;
use App\AlternativeQuestion;
use Illuminate\Http\Request;

class AlternativeQuestionController extends Controller
{
    public function create(Question $question)
    {
        return view('alternativeQuestion.form', [
            'question' => $question,
        ]);
    }

    public function store(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'question'=>'required',
        ]);

        $alt = new AlternativeQuestion($validatedData);
        $question->alternative()->save($alt);

        return redirect()->action('QuestionController@show', $question);
    }

    public function destroy(Question $question, AlternativeQuestion $alternativeQuestion)
    {
        //
    }
}
