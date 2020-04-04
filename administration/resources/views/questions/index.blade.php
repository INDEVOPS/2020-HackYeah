@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pb-2 text-right">
                <a type="button" class="btn btn-success" href="{{ action("QuestionController@create") }}">Add question</a>
            </div>

            @foreach ($questions as $question)
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-8">Question #{{ $question->id }}</div>
                            <div class="col-4 text-right">
                                <a type="button" class="btn btn-sm btn-primary mb-0" href="{{ action("QuestionController@show", $question) }}">Show</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4>
                            {{ $question->question }}
                            <small class="d-block" style="font-size: 0.6em;">{{ $question->alternative()->count() }} alternatives</small>
                        </h4>
                        {{ $question->answer }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
