<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
  </head>
  <body>
    <h1>会員登録</h1>

    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>

    <form action="{{ route('register') }}" method="post">
        @csrf 
        <dl class="form-list">
            <dt>姓</dt>
            <dd><input type="text" name="first_name" value="{{ old('first_name') }}"></dd>
            <dt>名</dt>
            <dd><input type="text" name="last_name" value="{{ old('last_name') }}"></dd>
            <dt>姓カナ</dt>
            <dd><input type="text" name="first_name_kana" value="{{ old('first_name_kana') }}"></dd>
            <dt>名カナ</dt>
            <dd><input type="text" name="last_name_kana" value="{{ old('last_name_kana') }}"></dd>
            <dt>性別</dt>
            <dd>
              <select name="sex">
                <option value="0"></option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="9">その他</option>
              </select>
            </dd>
            <dt>生年月日</dt>
            <dd><input type="date" name="date_of_birth"></dd>
            <dt>メールアドレス</dt>
            <dd><input type="email" name="email" value="{{ old('email') }}"></dd>
            <dt>パスワード</dt>
            <dd><input type="password" name="password"></dd>
            <dt>パスワード（確認用）</dt>
            <dd><input type="password" name="password_confirmation" placeholder="もう一度入力"></dd>
        </dl>
    <button type="submit">登録する</button>
    <a href="/">キャンセル</a>
    </form>
  </body>
</html>