<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>投稿一覧</h1>
        @foreach ($posts as $d)
        <div>
            <p>ユーザー名：{{$d->user->name}}</p>
            <img src="{{$d->img_url}}" alt="画像">
            <p>{{$d->caption}}</p>
            <button>like</button>
            <button>いいねしたユーザー</button>
        </div>
        @endforeach
        <button>前へ</button>
        <button>次へ</button>
    </div>
</body>
</html>