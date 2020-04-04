<?php

namespace App\Http\Controllers;

use App\Question;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    public function index()
    {
        $answers = [];
        $exported_questions = [];

        $questions = Question::all();

        foreach ($questions as $q) {
            $answers[] = $q->answer;

            $n = count($answers) - 1;

            $exported_questions[] = [
                'q' => $q->question,
                'n' => $n,
            ];

            foreach ($q->alternative as $a) {
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

    public function answers()
    {
        $answers = [];
        $exported_questions = [];

        $questions = Question::all();

        foreach ($questions as $q) {
            $answers[] = $q->answer;

            $n = count($answers) - 1;

            $exported_questions[] = [
                'q' => $q->question,
                'n' => $n,
            ];

            foreach ($q->alternative as $a) {
                $exported_questions[] = [
                    'q' => $a->question,
                    'n' => $n,
                ];
            }
        }

        return $answers;
    }

    public function questions()
    {
        $answers = [];
        $exported_questions = [];

        $questions = Question::all();

        foreach ($questions as $q) {
            $answers[] = $q->answer;

            $n = count($answers) - 1;

            $exported_questions[] = [
                'q' => $q->question,
                'n' => $n,
            ];

            foreach ($q->alternative as $a) {
                $exported_questions[] = [
                    'q' => $a->question,
                    'n' => $n,
                ];
            }
        }

        $output = '';
        
        foreach($exported_questions as $r){
            $output .= $r['q'] . ',' . $r['n'] . "\n";
        }
        
        return $output;
    }
}
