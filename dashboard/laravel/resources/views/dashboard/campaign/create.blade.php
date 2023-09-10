<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>campaign::register</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <form method="post" action="{{ route('campaign.store') }}" enctype="multipart/form-data">
            @csrf 
            <dl class="form-list">
                <dt>タイトル</dt>
                <dd><input type="text" name="title" value="{{ old('title') }}"></dd>
                <dt>内容</dt>
                <dd><input type="text" name="explanation" value="{{ old('explanation') }}"></dd>
                <dt>カテゴリー</dt>
                <dd>
                    <select name="category">
                        <option value="0">選択してください</option>
                        <option value="1">バナー</option>
                        <option value="2">イベント</option>
                    </select>
                </dd>
                <dt>設定ポイント</dt>
                <dd><input type="number" name="point" value="{{ old('point') }}"></dd>
                <dt>掲載期間：開始日</dt>
                <dd><input type="date" name="period_start"></dd>
                <dt>掲載期間：終了日</dt>
                <dd><input type="date" name="period_end"></dd>
                <dt>サムネイル</dt>
                <dd>
                    <input type="file" onchange="showImagePreview(this)" name="thumbnail">
                    <div id="image-preview"></div>
                </dd>
            </dl>
        <button type="submit">作成</button>
        <a href="{{ route('campaign.index') }}">キャンセル</a>
    </form>
    </body>
</html>