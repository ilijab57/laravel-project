@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
<a class="btn btn-primary" href="topic/create" role="button">Create new Topic</a>
</div>

<div class="container mt-5">
<h1>Forum</h1>
@foreach($topics as $topic)
@if($topic->status == 'aproved')
<div class="media mt-5 mb-5">
  <img src="{{$topic->image_url}}"class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0">{{$topic->title}}</h5>
  <p>{{$topic->description}}</p>
  </div>
  <a class="btn btn-info mr-3" href="/topic/show/{{$topic->id}}" role="button">View/Comment</a>

  @if($topic->user_id == Auth::id())
  <a class="btn btn-info edit_btn" href="/topic/edit/{{$topic->id}}" role="button">Edit</a>

<form action="/topic/delete/{{$topic->id}}" method="POST">
@csrf
@method('DELETE')
<button class="btn btn-danger ml-3" type="submit">Delete</button>
</form>
@endif
</div>
@endif
@endforeach

</div>
@endsection
