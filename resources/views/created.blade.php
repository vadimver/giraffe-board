@extends('layouts.app')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    
    <form action="{{ url('/create') }}" method="POST">
        <div class="col-md-8 offset-md-2">
            <input type="text" class="form-control" name="title" placeholder="Title">
        </div>
        <div class="col-md-8 offset-md-2"><br>
            <textarea class="form-control textarea-form" name="description" placeholder="Description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
    
</div>
@endsection