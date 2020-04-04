@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ isset($question) ? 'Edit' : 'Add' }} question</h1>
            <hr>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @isset($question)
                <form method="post" action="{{ action('QuestionController@update', $question ) }}">
                @method('PATCH')
            @else
                <form method="post" action="{{ action('QuestionController@store' ) }}">
            @endif

            @csrf
                <div class="form-group">    
                    <label for="question">Question:</label>
                    <input type="text" class="form-control" name="question" id="question" value="{{ isset($question) ? $question->question : '' }}" />
                </div>

                <div class="form-group">    
                    <label for="answer">Answer:</label>
                    <textarea type="text" class="form-control" name="answer" id="answer">{{ isset($question) ? $question->answer : '' }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($question) ? 'Update' : 'Add' }}</button>
            </form>

        </div>
    </div>
</div>
{{--      


<div class="form-group">
    <label for="last_name">Last Name:</label>
    <input type="text" class="form-control" name="last_name"/>
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email"/>
</div>
<div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" name="city"/>
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" class="form-control" name="country"/>
</div>
<div class="form-group">
    <label for="job_title">Job Title:</label>
    <input type="text" class="form-control" name="job_title"/>
</div>                         

--}}
@endsection
