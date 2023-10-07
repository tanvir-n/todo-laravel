@extends('layouts.app')


@section('content')
<div class="row mt-2 ml-2">
    <div class="col-md-10">
        <h2>Edit Role</h2>
    </div>
    <div class="col-md-2 d-grid d-flex justify-content-center my-2">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


<div class="row my-2 mx-2">
    <form action="{{route('roles.update', $role->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Permission</label>
            <div class="col-sm-10">
                @foreach($permission as $value)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->id }}"
                    @if (in_array($value->id, $rolePermissions)) 
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="{{ $value->id }}">{{ $value->name }}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection