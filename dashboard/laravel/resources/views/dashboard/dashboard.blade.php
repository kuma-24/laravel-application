<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
</head>
<body>
    <a href="{{ route('administrator.index') }}">管理者管理</a>
    <a href="{{ route('campaign.index') }}">キャンペーン管理</a>
    <a href="{{ route('account.profile') }}">マイページ</a>
    <form method="post" action="{{ route('logout') }}">
        @csrf 
        <button type="submit">ログアウト</button>
    </form>
</body>
</html>