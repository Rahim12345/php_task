@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/redirect.css') }}">
@endsection

@section('content')
    <input type="hidden" id="url" value="{{ $link }}">
    <div id="app"></div>
@endsection

@section('js')
    <script src="{{ asset('js/redirect.js') }}"></script>
@endsection
