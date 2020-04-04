@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">Question #{{ $question->id }}</div>
                        <div class="col-8 text-right">
                            <a type="button" class="btn btn-sm btn-primary mb-0" href="{{ action("QuestionController@edit", $question) }}">Edit</a>
                            <a type="button" class="btn btn-sm btn-primary mb-0" href="{{ action("AlternativeQuestionController@create", $question) }}">Add alternative question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>Pytania</h4>
                    <ul>
                        <li><b>{{ $question->question }}</b></li>
                        @foreach ($question->alternative as $alternative)
                            <li>
                                <form action="{{ action("AlternativeQuestionController@destroy", [$question, $alternative]) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mb-1">Delete</button>
                                </form>
                                {{ $alternative->question }}
                            </li>
                        @endforeach
                    </ul>
                    <h4>Odpowiedź</h4>
                    {{ $question->answer }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
