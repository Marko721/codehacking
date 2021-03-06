@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    @if (Session::has('deleted category'))

        <p class="bg-success">{{session('deleted category')}}</p>

    @elseif (Session::has('updated category'))

        <p class="bg-success">{{session('updated category')}}</p>
        
    @endif

    <div class="row">

        {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-primary'] ) !!}
        </div>

        {!! Form::close() !!}


    </div>

    <div class="row">

        @if ($categories)

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created date</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)

                    <tr>
                        <td>{{$category->id}}</td>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'no date'}}</td>
                    </tr>

                @endforeach

            </tbody>
        </table>

        @endif

    </div>

    
@endsection