<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $questions = Question::all();

        return view('questions.index', [
            'questions' => $questions,
        ]);
    }

    public function create()
    {
        return view('questions.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $q = new Question($validatedData);
        
        $q->save();

        return redirect()->action('QuestionController@show', $q);
    }

    public function show(Question $question)
    {
        return view('questions.show', [
            'question' => $question,
        ]);
    }

    public function edit(Question $question)
    {
        return view('questions.form', [
            'question' => $question,
        ]);
    }

    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $question->fill($validatedData);
        $question->save();

        return redirect()->action('QuestionController@show', $question);
    }

    public function destroy(Question $question)
    {
        //
    }
}
