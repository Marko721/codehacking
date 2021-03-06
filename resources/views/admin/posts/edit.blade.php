@extends('layouts.admin')


@section('content')

    <h1>Edit post</h1>

    {{-- <form action="{{ route('admin.posts.create') }}" enctype="multipart/form-data" method="POST">

        <div class="form-group">
            <label for="title">Title:</label>
            <input class="form-control" type="text" name="title" >
        </div>

        <input type="submit" value="Create Post" class="btn btn-success">

    </form> --}}

    <div class="row">

        <div class="col-sm-3">

            <img class="img-responsive" src="{{$post->photo ? $post->photo->file : ''}}" alt="">

        </div>

        <div class="col-sm-9">

        {!! Form::model($post, ['method'=>'PATCH', 'action'=> ['AdminPostsController@update', $post->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div cl3ass="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>


        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete post', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

    


    
@endsection