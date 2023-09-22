@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ config('app.name') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<main class="py-4 mx-4">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4">{{ config('app.name') }}</h1>
                <p class="lead">This is a simple todo application, Within this application any todo can be add, edit, delete and make that todo completed.</p>
                <hr class="my-4">
                <p></p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
                </p>
            </div>

            <div class="col-md-4 justify-content-center">        
                <img src="{{asset('img/todo.png')}}" width="100%" height="100%" alt="todo image">
            </div>
            </div>        
    </div>
</main>
@endsection
