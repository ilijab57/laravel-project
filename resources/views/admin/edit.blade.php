@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <form action="/admin/update/{{$topic->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$topic->title}}">
        </div>

        <div class="form-group">
            <label for="imgae_url">Image:</label>
            <input type="text" class="form-control" id="image_url" name="image_url" value="{{$topic->image_url}}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$topic->description}}">
        </div>
        
        <div class="form-group">
            <label for="category">Example select</label>
            <select class="form-control" id="category" name="category">
            @foreach($categories as $key => $category)
            <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>



@endsection