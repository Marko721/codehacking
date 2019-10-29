@extends('layouts.admin')


@section('content')

    <h1>Edit User</h1>

    <div class="row">

        <div class="col-sm-3">

            <img width="200" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/200x200'}}" alt="" class="img-resposnive img-rounded">

        </div>


        <div class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            
            {{-- <form action="{{route('admin.users.update', ['id'=>$user->id])}}" enctype="multipart/form-data" method="POST">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" value="{{$user->name}}">
                </div> --}}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::close() !!}




            {!! Form::open(['method'=>'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-6']) !!}
                </div>

            {!! Form::close() !!}


            
            {{-- <form action="{{route('admin.users.destroy', ['id'=>$user->id])}}" enctype="multipart/form-data" method="POST" >
                <div class="form-group">
                    <input type="submit" value="Delete User" class="btn btn-danger" name="delete">
                    {!! method_field('delete') !!}
                    {!! csrf_field() !!}
                </div>
            </form> --}}

        </div>

    </div>


    <div class="row">
        @include('includes.form_error')
    </div>




    
    


@endsection