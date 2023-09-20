@extends('layouts.app')
@section('content')
<div id="todoslist" class="m-0" todos={{$todos}}></div>
@endsection

@push('scripts')
    <script src="{{asset('js/addbutton.js')}}"></script>
    <script src="{{asset('js/todoslist.js')}}"></script>
@endpush