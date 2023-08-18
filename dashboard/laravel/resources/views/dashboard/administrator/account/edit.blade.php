<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>edit</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')
            
            <dt>姓</dt>
            <dd><input type="text" name="first_name" value="{{ $profiles->first_name }}"></dd>
            <dt>名</dt>
            <dd><input type="text" name="last_name" value="{{ $profiles->last_name }}"></dd>
            <dt>姓カナ</dt>
            <dd><input type="text" name="first_name_kana" value="{{ $profiles->first_name_kana }}"></dd>
            <dt>名カナ</dt>
            <dd><input type="text" name="last_name_kana" value="{{ $profiles->last_name_kana }}"></dd>
            <dt>メールアドレス</dt>
            <dd><input type="email" name="email" value="{{ $profiles->administrator->email }}"></dd>
        
        <button type="submit">Save Changes</button>
    </form>
    </body>
</html>