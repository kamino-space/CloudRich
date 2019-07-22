<!DOCTYPE html>
<html lang="zh-hans">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('layui/css/layui.css') }}" media="all" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <script src="{{ URL::asset('js/jquery.min.js' )}}"></script>
    <script src="{{ URL::asset('layui/layui.js') }}"></script>
    <script src="{{ URL::asset('js/script.js') }}"></script>
</head>

<body>
    <div class="header layui-header header header-doc layui-nav">
        <div class="header-title">
            <a href="{{ url('/admin') }}">
                CloudRich Admin
            </a>
        </div>
        <div class="header-user">
            <ul lay-filter="">
                @guest
                <li class="layui-nav-item"><a href="{{ route('login') }}">登录</a></li>
                @if (Route::has('register'))
                <li class="layui-nav-item"><a href="{{ route('register') }}">注册</a></li>
                @endif
                @else
                <li class="layui-nav-item">{{ Auth::user()->name }}</li>
                <li class="layui-nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">退出</a></li>
                <li class="layui-nav-item"><a target="_blank" href="{{ url('/') }}">查看网站</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
        </div>
        </ul>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="footer"></div>
</body>
<script>
    layui.use('element', function() {
        var element = layui.element;
    });
</script>

</html>