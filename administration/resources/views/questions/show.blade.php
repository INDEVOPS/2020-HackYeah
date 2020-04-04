@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">Question #{{ $question->id }}</div>
                        <div class="col-4 text-right">
                            <a type="button" class="btn btn-sm btn-primary mb-0" href="{{ action("QuestionController@edit", $question) }}">Edit</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h4>{{ $question->question }}</h4>
                    {{ $question->answer }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
