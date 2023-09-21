<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Application::top</title>
    </head>
    <body>
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf 
                <button type="submit">ログアウト</button>
            </form>
        @else
            <a href="{{ route('login') }}">signIn</a>
            <a href="{{ route('register') }}">signUp</a>
        @endauth
    </body>
</html>