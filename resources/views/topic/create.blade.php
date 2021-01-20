@extends('layouts.app');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/topic/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="imgae_url">Image:</label>
            <input type="text" class="form-control" id="image_url" name="image_url">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description">
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