@extends('layouts.app')


@section('content')
<div class="row mt-2 ml-2">
    <div class="col-md-10">
        <h2>Role Management</h2>
    </div>
    <div class="col-md-2 d-grid d-flex justify-content-md-centert">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        @endcan
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
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <div class="form-check form-check-inline">
                <a class="btn btn-info mx-1" href="{{route('roles.show',$role->id)}}">Show</a>
                @can('role-edit')
                <a class="btn btn-primary mx-1" href="{{route('roles.edit',$role->id)}}">Edit</a>
                @endcan
                @can('role-delete')
                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger mx-1" type="submit" value="Delete" />
                </form>
                @endcan
            </div>
        </td>
    </tr>
    @endforeach
</table>


{{-- {!! $roles->render() !!} --}}


@endsection