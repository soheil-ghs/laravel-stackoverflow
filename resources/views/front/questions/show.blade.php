@extends('front.layouts.question')

@section('content')

    <h1>{{$question->title}}</h1>

    <p class="lead">
        by <a href="#">{{ $question->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>
        <span class="fa fa-clock-o"></span>
        Posted {{$question->created_at->diffForHumans()}}
    </p>

    <hr>

    <p>
        {!! $question->body !!}
    </p>

    <hr>

    @if(Session::has('create_answer'))
        <p class="alert alert-success">
            {{session('create_answer')}}
        </p>
    @endif

    @if(Session::has('create_comment'))
        <p class="alert alert-success">
            {{session('create_comment')}}
        </p>
    @endif

    @if(Auth::check())
        <div class="well">
            <h4>Leave An Answer:</h4>

            @if ($errors->count())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('front.answers.store') }}">
                @csrf

                <input type="hidden" name="question_id" value="{{$question->id}}">

                <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" id="body" name="body"
                              rows="5" required>{{ old('body') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>

        </div>
    @else
        <div class="well">
            <p>
                <a href="{{ route('login')}}">
                    Log in
                </a>
                or
                <a href="{{ route('register') }}">
                    Register
                </a>
                for leave An Answer to this Question
            </p>
        </div>
    @endif

    <hr>

    @if(count($answers) > 0)

        <h3>Answers :</h3>

        @foreach($answers as $answer)
            <div class="media">

                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $answer->user->name}}
                        <small>
                            {{ $answer->created_at->diffForHumans() }}
                        </small>
                    </h4>

                    <p>{{$answer->body}}</p>

                    <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">
                            Reply
                        </button>

                        <div class="comment-reply col-sm-6">
                            <form method="POST"
                                  action="{{ route('front.comments.store') }}">
                                @csrf

                                <div class="form-group">

                                    <input type="hidden"
                                           name="answer_id"
                                           value="{{$answer->id}}">

                                    <div class="form-group">
                                        <label for="body">Description</label>
                                        <textarea class="form-control" id="body" name="body"
                                                  rows="5" required>{{ old('body') }}</textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>

                            </form>
                        </div>

                    </div>

                    @if(count($comments = $answer->comments) > 0)
                        @foreach($comments as $comment)
                            <div class="col-sm-12">
                                <!-- Nested Comment -->
                                <div id="nested-comment" class="media">
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            {{$comment->user->name}}
                                            <small>
                                                {{$comment->created_at->diffForHumans()}}
                                            </small>
                                        </h4>
                                        <p>{{$comment->body}}</p>
                                    </div>

                                </div>
                                <!-- End Nested Comment -->
                            </div>
                        @endforeach
                    @endif

                </div>

            </div>
        @endforeach

    @endif

@stop

@section('scripts')

    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        });
    </script>

@stop
