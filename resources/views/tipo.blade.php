@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">

    <form id="formTipo">
        {{ csrf_field() }}
        <div id="app">
            <tipo-view :tipo-sigla="{{ $tipoSigla }}" />
        </div>
    </form>
@stop
@section('js')

    <script src="{{ url('js/alertifyjs/alertify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@stop