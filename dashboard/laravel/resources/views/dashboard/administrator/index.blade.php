<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document::index</title>
    </head>
    <body>
        <form method="post" action="{{ route('set-flag') }}">
            @csrf
            <button type="submit">Set User Create Flag in Session</button>
        </form>
        @foreach($administrators as $administrator)
            <li><a href="{{ route('administrator.show', $administrator->id) }}">{{ $administrator->email }}</a></li>
        @endforeach
    </body>
</html>