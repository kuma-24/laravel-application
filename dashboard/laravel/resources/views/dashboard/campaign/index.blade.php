<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>campaign::index</title>
    </head>
    <body>
        <a href="{{ route('campaign.create') }}">キャンペーン作成</a>
        <a href="{{ route('dashboard') }}">戻る</a>

        @foreach($campaigns as $campaign)
            <li>
                <a href="{{ route('campaign.show', $campaign) }}">{{ $campaign->title }}</a>
                @if ($campaign->administrator_id === auth()->user()->id)
                    <a href="{{ route('campaign.edit', $campaign) }}">編集</a>
                    <form action="{{ route('campaign.delete', $campaign) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                @endif
            </li>
        @endforeach
    </body>
</html>