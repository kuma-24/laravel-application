<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>show</title>
    </head>
    <body>
        <p>firstName: {{ $campaign->administrator_id }}</p>
        <a href="{{ route('campaign.index') }}">戻る</a>
    </body>
</html>