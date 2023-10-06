@extends('layouts.app')


@section('content')
<div class="row mt-2 ml-2">
    <div class="col-md-9 margin-tb">
      <h2>User Management</h2>
    </div>
    <div class="col-md-3 d-grid d-flex justify-content-md-center">
        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
    </div>
       
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered my-2">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
       <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}">Delete</a>
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


@endsection