<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>profile</title>
    </head>
    <body>
        <a href="{{ route('profile.edit') }}">マイページ編集</a>
        <p>firstName: {{ $profiles->first_name }}</p>
        <p>barth-date: {{ $profiles->date_of_birth }}</p>
        <a href="{{ route('dashboard') }}">戻る</a>
    </body>
</html>