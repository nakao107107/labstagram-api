<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/create"  method="POST">
        <div class="form-group">
            <label for="">キャプション</label>
            <input name="caption" type="text">
        </div>
        <div class="form-group">
            <label for="">画像url</label>
            <input name="img_url" type="text">
        </div>
        {{ csrf_field() }}
        <input type="submit" value="投稿">
    </form>
</body>
</html>