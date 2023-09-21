<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Application:login</title>
    </head>
    <body>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    
        <form action="{{ route('login') }}" method="post">
            @csrf 
            <dl class="form-list">
                <dt>メールアドレス</dt>
                <dd><input type="email" name="email" value="{{ old('email') }}"></dd>
                <dt>パスワード</dt>
                <dd><input type="password" name="password"></dd>
                <dt>remember_me</dt>
                <dd><input id="remember_me" type="checkbox"></dd>
            </dl>
            <button type="submit">ログイン</button>
        </form>
        <a href="{{ route('welcome') }}">戻る</a>
    </body>
</html>