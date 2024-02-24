@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">

    <form id="formCultura">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <div class="row" style="text-align: center">
                    <div class="col-sm-12">
                        <h5>Secretaria de Cultura</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="app">
                    <div class="container">
                        <cultura-view />
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('js')

    <script src="{{ url('js/alertifyjs/alertify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@stop