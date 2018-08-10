@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($boards as $board)
            <div class="card">
                <div class="card-header">
                    {{$board->title}}
                    @if (isset(Auth::user()->id))
                        @if(Auth::user()->id == $board->user_id)
                            <form action="{{ url("/edit/$board->id") }}" method="GET">
                                <button type="submit" class="btn btn-warning btn-edit"><i class="fas fa-edit"></i></button>
                            </form>
                            <form action="{{ url("/delete/$board->id") }}" method="POST">
                                <input type="hidden" name="_method" value="delete" />
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-del">x</button>
                            </form>
                        @endif
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
