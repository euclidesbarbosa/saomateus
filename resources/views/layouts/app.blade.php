<!DOCTYPE html>
{{--<!doctype html>--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/alertifyjs/alertify.js') }}" defer></script>

    {{--BASE URL--}}
    <script>
        const _BASE_URL = {!! json_encode('//'.request()->getHttpHost().'/') !!};
        const _CIDADE_NOME = "{{ env('MIX_APP_CIDADE_NOME') }}";
        const _CIDADE_ID = "{{ env('MIX_APP_CIDADE_ID') }}";
        const _CIDADE_IBGE = "{{ env('MIX_APP_CIDADE_IBGE') }}";
        const _CIDADE_CEP = "{{ env('MIX_APP_CIDADE_CEP') }}";
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    {{--ALERTIFY--}}
    <link rel="stylesheet" href="{{ asset('js/alertifyjs/css/alertify.css') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E2W8D0TLHV"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-E2W8D0TLHV');
</script>
<body>
<div id="app">
    <div align="center">
{{--    <img :src="'../storage/icones/barrasuperior.png'">--}}
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div id="app" v-show="{{\Illuminate\Support\Facades\Auth::id() != 0}}">
                    <menu-view :user-login="{{json_encode([Auth::user()])}}" />
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                               href="#" role="button" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->user_nome }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end"
                                 aria-labelledby="navbarDropdown">

                                @if(Auth::user()->tipo_perfil_id <= 3)

                                <a class="dropdown-item" href="{{ url('user/index') }}">
                                    {{ __('Usuários') }}
                                </a>

                                @endif

                                <a class="dropdown-item" href="{{ url('user/indexMudaSenha') }}">
                                    {{ __('Mudar a senha') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                <hr>
                                <a class="dropdown-item" href="https://wa.me/5598984010204">
                                    <img src="{{url('storage/icones/whatsapp.png')}}" style="width: 25px;height: 25px" />{{ __(' Suporte via WhatsApp') }}
                                </a>
                                <a class="dropdown-item" href="{{url('storage/videos/scm_aula01.mp4')}}">
                                    <img src="{{url('storage/icones/video.png')}}" style="width: 25px;height: 25px" />{{ __(' Video Aula 01') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}"
                                      method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
