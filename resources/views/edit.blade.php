@extends('layouts.app')
@section('content')
<div id="edittodo" class="m-2" todo={{$todo}}></div>
@endsection

@push('scripts')
    <script src="{{asset('js/edittodo.js')}}"></script>
@endpush