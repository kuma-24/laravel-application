<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>show</title>
    </head>
    <body>
        <p>firstName: {{ $administrator->administrator_account->first_name }}</p>
        <a href="{{ route('administrator.index') }}">戻る</a>
    </body>
</html>