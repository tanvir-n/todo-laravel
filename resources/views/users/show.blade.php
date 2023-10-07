@extends('layouts.app')


@section('content')
<div class="row mt-2 ml-2">
    <div class="col-md-10">
        <h2>Show User</h2>
    </div>
    <div class="col-md-2 d-grid d-flex justify-content-md-center my-2">
        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
    </div>
</div>


<div class="row mt-2 ml-2">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection