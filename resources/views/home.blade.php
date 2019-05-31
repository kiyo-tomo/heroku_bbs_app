@extends('layout')

@section('content')

<html>

<head>
    <meta charset='utf-8'>
</head>

<body>
    Hello!

    @if (Auth::check())
    {{\Auth::user()->name}}さん<br />
    <a href="/auth/logout">Logout</a>

    {{--成功時のメッセージ--}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- エラーメッセージ --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @else
    ゲストさん<br />
    <a href="/auth/login">Login</a><br />
    <a href="/auth/register">会員登録</a>
    @endif
</body>

</html>

@endsection