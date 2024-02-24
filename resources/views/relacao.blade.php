@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">

    <form id="formRelacao">
        {{ csrf_field() }}
        <div class="container">
            <relacao-view></relacao-view>
        </div>
    </form>
@stop
@section('js')

    <script src="{{ url('js/alertifyjs/alertify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@stop