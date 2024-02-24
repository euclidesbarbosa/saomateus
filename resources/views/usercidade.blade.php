@extends('layouts.app')
@section('content')

    <link href="{{ asset('css/padrao.css') }}" rel="stylesheet">

    <form id="formUserCidade">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-header">
                <div class="row" style="text-align: center">
                    <div class="col-sm-12">
                        <h3>Cidades do usuário</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="app">
                    <usercidade-view :user="{{json_encode(Auth::user(Auth::id()))}}" />
                </div>
            </div>
        </div>
    </form>
@stop
@section('js')

    <script src="{{ url('js/alertifyjs/alertify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@stop