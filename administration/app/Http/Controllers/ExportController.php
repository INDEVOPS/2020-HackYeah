<?php

namespace App\Http\Controllers;

use App\Question;
use App\AlternativeQuestion;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $answers = [];
        $exported_questions = [];

        $questions = Question::all();

        foreach($questions as $q) {
            $answers[] = $q->answer;
            
            $n = count($answers) - 1;

            $exported_questions[] = [
                'q' => $q->question,
                'n' => $n,
            ];

            foreach($q->alternative as $a){
                $exported_questions[] = [
                    'q' => $a->question,
                    'n' => $n,
                ];
            }
        }

        return view('export', [
            'answers' => $answers,
            'questions' => $exported_questions,
        ]);
    }
}
