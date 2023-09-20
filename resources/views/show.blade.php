@extends('layouts.app')
@section('content')
<div id="showContent" class="m-2" todo={{$todo}}></div>
@endsection

@push('scripts')
<script src={{asset("js/tododetails.js")}}></script>
@endpush