@extends('layouts.app')

@section('content')

<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    @php
        $val = 0;
    @endphp
    
    @foreach($boards as $board)
        @php $val++; @endphp
        <form action="{{ url("/edit/$board->id") }}" method="POST">
            <input type="hidden" name="_method" value="put" />
            {{ csrf_field() }}
            <div class="col-md-8 offset-md-2">
                <input type="text" class="form-control" name="title" value="{{$board->title}}">
            </div>
            <div class="col-md-8 offset-md-2"><br>
                <textarea class="form-control textarea-form" name="description">{{$board->description}}</textarea>
            </div><br>
            <div class="col-md-2 offset-md-2">
                <button type="submit" class="btn btn-warning btn-create">Save</button>
            </div>
        </form>
    @endforeach

    @if ($val == 0)
        <form action="{{ url('/create') }}" method="POST">
            {{ csrf_field() }}
            <div class="col-md-8 offset-md-2">
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="col-md-8 offset-md-2"><br>
                <textarea class="form-control textarea-form" name="description" placeholder="Description"></textarea>
            </div><br>
            <div class="col-md-2 offset-md-2">
                <button type="submit" class="btn btn-success btn-create">Create</button>
            </div>
        </form>
    @endif
</div>
@endsection
