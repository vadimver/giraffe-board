@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer text-muted row">
                    <div class="card-author col-md-6">
                        name
                    </div>
                    <div class="card-time col-md-6">
                        date
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer text-muted">
                  name
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
