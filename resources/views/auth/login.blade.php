@extends('layouts.app')

@section('content')
<div class="login-box">
    <form class="layui-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label" for="email">邮箱</label>
            <div class="layui-input-block">
                <input type="email" id="email" name="email"  value="{{ old('email') }}" required lay-verify="required" class="layui-input" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" for="password">密码</label>
            <div class="layui-input-block">
                <input type="password" id="password" name="password" required lay-verify="required" class="layui-input">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" for="remember">保持登录</label>
            <div class="layui-input-block">
                <input type="radio" name="remember" value="yes" title="是">
                <input type="radio" name="remember" value="no" title="否" checked>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" lay-submit lay-filter="formDemo">登录</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script>
    layui.use('form', function() {
        var form = layui.form;
    });
</script>
@endsection