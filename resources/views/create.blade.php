@extends('layouts.app')
@section('content')
<div id="createtodo" class="m-2"></div>
@endsection

@push('scripts')
    <script src="{{asset('js/creattodo.js')}}"></script>
@endpush