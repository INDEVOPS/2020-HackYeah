@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add alternative question</h1>
            <h3>Original question: {{ $question->question }}</h3>
            <hr>

            <form method="post" action="{{ action('AlternativeQuestionController@store', $question ) }}">

            @csrf
                <div class="form-group">    
                    <label for="question">Question:</label>
                    <input type="text" class="form-control" name="question" id="question" />
                </div>

                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>
    </div>
</div>
@endsection
