<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{$user->name}}</p>
    @foreach ($posts as $d)
    <div>
        <img src="{{$d->img_url}}" alt="画像">
    </div>
    @endforeach
</body>
</html>