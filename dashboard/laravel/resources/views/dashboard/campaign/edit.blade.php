<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>campaign::edit</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <form method="post" action="{{ route('campaign.update', $campaign) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <dl class="form-list">
                <dt>タイトル</dt>
                <dd><input type="text" name="title" value="{{ $campaign->title }}"></dd>
                <dt>内容</dt>
                <dd><input type="text" name="explanation" value="{{ $campaign->explanation }}"></dd>
                <dt>カテゴリー</dt>
                <dd>
                    <select name="category">
                        <option value="0">選択してください</option>
                        <option value="1">バナー</option>
                        <option value="2">イベント</option>
                    </select>
                </dd>
                <dt>設定ポイント</dt>
                <dd><input type="number" name="point" value="{{ $campaign->point }}"></dd>
                <dt>掲載期間：開始日</dt>
                <dd><input type="date" name="period_start" value="{{ date('Y-m-d', strtotime($campaign->period_start)) }}"></dd>
                <dt>掲載期間：終了日</dt>
                <dd><input type="date" name="period_end" value="{{ date('Y-m-d', strtotime($campaign->period_end)) }}"></dd>
                <dt>サムネイル</dt>
                <dd>
                    <input type="file" name="thumbnail">
                </dd>
            </dl>
        <button type="submit">作成</button>
        <a href="{{ route('campaign.index') }}">キャンセル</a>
    </form>
    </body>
</html>