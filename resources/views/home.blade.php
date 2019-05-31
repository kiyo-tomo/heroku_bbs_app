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

    {!! Form::open(['url' => '/upload', 'method' => 'post', 'files' => true]) !!}

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

    <div class="form-group">
        @if ($user->avatar_filename)
        <p>
            <img src="{{ asset('storage/avatar/' . $user->avatar_filename) }}" alt="avatar" />
        </p>
        @endif
        {!! Form::label('file', '画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('file') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('アップロード', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
    @else
    ゲストさん<br />
    <a href="/auth/login">Login</a><br />
    <a href="/auth/register">会員登録</a>
    @endif
</body>

</html>

@endsection