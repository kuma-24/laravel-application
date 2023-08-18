<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    @if (cache('register_authorization_flag'))
        <a href="{{ route('register') }}">新規登録</a>
    @else
        <p>Flag is not set in session.</p>
    @endif

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    
    <form method="post" action="{{ route('login') }}">
        @csrf 
        <dl class="form-list">
            <dt>メールアドレス</dt>
            <dd><input type="email" name="email" value="{{ old('email') }}"></dd>

            <dt>パスワード</dt>
            <dd><input type="password" name="password"></dd>

            {{-- <dt>remember_me</dt>
            <dd><input id="remember_me" type="checkbox"></dd> --}}
        </dl>
        <button type="submit">ログイン</button>
        <a href="/">キャンセル</a>
    </form>
  </body>
</html>