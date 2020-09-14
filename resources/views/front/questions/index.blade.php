@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session()->has('create_question'))
            <div class="alert alert-success">
                {{ session('create_question')}}
            </div>
        @endif

        <div class="row">
            @foreach($questions as $question)
                <div class="card col-md-8 offset-2 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('front.questions.show', $question->id) }}">
                                {{ $question->title}}
                            </a>
                        </h5>

                        <p class="card-text">
                            {{ $question->body }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-sm-6 offset-5">
                {{ $questions->render() }}
            </div>
        </div>

    </div>
@stop
