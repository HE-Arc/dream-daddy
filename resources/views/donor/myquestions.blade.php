@extends('layouts.app')

@section('content')

<div class="container">
    <div class="status">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    </div>
    <div class="row">
        <h1 class="col">Public questions</h3>
    </div>
    <div class="row">
        <p class="col">Select a question you want to answer to</p>
    </div>
    <form method="POST" action="{{route('donor.reply')}}"  enctype="multipart/form-data">
    @csrf
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                @foreach ($questions as $question)
                @if ($question->question==1)
                    <div class="text-md-left"><input type="radio" id="{{$question->seeker_id}}" name="seeker_id" value="{{$question->seeker_id}}" required><strong>
                    @if ($question->anonymous==1)
                        Anonymous:
                    @else
                        {{$question->name}}:
                    @endif
                    </strong></strong><br/>{{$question->message}}
                @else
                    <div class="text-md-right"><strong>{{$user->name}}</strong></br>{{$question->message}}
                @endif
                <br/><a href="#"><span class="text-danger">delete</a></div>
                @endforeach
            </div>
        </div>

        
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <h3>Reply to question</h3>
                <textarea class="form-control" id="message" name="message" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Validate') }}
                </button>
            </div>
        </div>
    </form>

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <a href="#" class="btn btn-danger btn-block">
                {{ __('Delete all questions') }}
            </a>
        </div>
    </div>
</div>
@endsection
