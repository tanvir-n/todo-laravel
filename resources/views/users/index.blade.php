@extends('layouts.app')


@section('content')
<div class="row mt-2 ml-2">
    <div class="col-md-9">
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
      <div class="form-check form-check-inline">
        <a class="btn btn-info mx-1" href="{{ route('users.show',$user->id) }}">Show</a>
        @can('user-edit')
          <a class="btn btn-primary mx-1" href="{{ route('users.edit',$user->id) }}">Edit</a>
        @endcan
        @can('user-delete')
        <form action="{{route('users.destroy',$user->id)}}" method="POST">
          @csrf
          @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger mx-1"/>
        </form>
        @endcan
      </div>
    </td>
  </tr>
 @endforeach
</table>


{{-- {!! $data->render() !!} --}}


@endsection