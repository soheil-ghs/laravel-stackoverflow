@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($errors->count())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form class="col-md-9" method="POST"
                  action="{{ route('front.questions.store') }}">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" name="title"
                           value="{{ old('title') }}"
                           placeholder="Enter Title" required>
                </div>

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

    </div>
@stop
