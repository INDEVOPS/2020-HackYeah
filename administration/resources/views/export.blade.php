@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card mb-3">
                <div class="card-header">
                    answers.json
                </div>
                <pre class="card-body mb-0"><code>@json($answers)</code></pre>
            </div>

            <div class="card">
                <div class="card-header">
                    questions.csv
                </div>
                <pre class="card-body mb-0"><code><?php
                
                foreach($questions as $r){
                    echo $r['q'] . ',' . $r['n'] . "\n";
                }
                
                ?></code></pre>
            </div>
        </div>
    </div>
</div>
@endsection
