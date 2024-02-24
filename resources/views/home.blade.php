@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container-fluid">
            {{--        <cadastro-view :newchefefamiliar="{{$newChefeFamiliar}}" />--}}
            <home-view></home-view>
        </div>
    </div>
@endsection
@section('js')

    <script src="{{ url('js/alertifyjs/alertify.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

@stop