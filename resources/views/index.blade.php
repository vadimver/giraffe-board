@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($boards as $board)
            <div class="card">
                <div class="card-header">
                    {{$board->title}}
                    @if(Auth::user()->id == $board->user_id)
                        <a href="{{ url("/delete/$board->id") }}" class="btn btn-danger btn-del">x</a>
                    @endif
                </div>
                <div class="card-body">
                  
                  <p class="card-text">{{$board->description}}</p>
                </div>
                <div class="card-footer text-muted row">
                    <div class="card-author col-md-6">
                        {{$board->name}}
                    </div>
                    <div class="card-time col-md-4 offset-md-2">
                        {{$board->created_at}}
                        
                    </div>
                </div>
            </div>
            @endforeach
            <br>
            <div class="pagination">
                {{ $boards->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
