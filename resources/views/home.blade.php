@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome!</p>
                </div>
            </div>
            <br><br>
            <div align="center">
                <button class="btn btn-success w-50 align-content-center" type="button" onclick="window.location='{{ url("/mybooks") }}'">My Books</button>
            </div>
        </div>
    </div>
</div>


@endsection
