@extends('layouts.app')

@section('content')


<div class="container mt-5">
<a class="btn btn-primary" href="/home" role="button">Go Back To Home Page</a>
</div>

        <div class="container mt-5">
            <h1>View/Comment</h1>
            <div class="media mt-5 mb-5">
            <img src="{{$topic->image_url}}"class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0">{{$topic->title}}</h5>
            <p>{{$topic->description}}</p>
            </div>
        </div>
    
    @if(Auth::check())
    <form action="/topic/comment" method="POST">
    @csrf
        <div class="form-group">
            <label for="comment">Leave Comment:</label>
            <textarea class="form-control" id="comment" rows="5" name="comment"></textarea>
        </div>
        <input type="hidden" name="topic_id" value="{{ $topic->id }}" />
        <input type="hidden" name="user_id" value="{{ Auth::id()}}" />
        <button class="btn btn-primary" type="submit">Add Comment</button>
    </form>
   
    @else
    <div class="alert alert-danger" role="alert">
        You must be logged in to leave comment!
    </div>
    @endif

    <h4 class="mt-5">Comments:</h4>
    @foreach($comments as $comment)
    <div class="comment">
    {{$comment->comment}}
    <p>{{$comment->user->username}} {{$comment->created_at}}</p>
</div>
    @endforeach

</div>
@endsection
