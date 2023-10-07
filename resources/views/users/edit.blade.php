@extends('layouts.app')


@section('content')
<div class="row mt-2 ml-2">
    <div class="col-md-10">
        <h2>Edit User</h2>
    </div>
    <div class="col-md-2 d-grid d-flex justify-content-center my-2">
        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
    <form method="PATCH" action="{{ route('users.update', $user->id)}}" novalidate>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" value="{{ $user->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail" value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" value="{{ $user->password }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputConfirmPassword" value="{{ $user->password }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select class="form-control">
                    @foreach ($roles as $role)
                        <option>{{ $role }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        {{-- <input type="hidden" name="_token" value="' + this.csrf + '"> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection