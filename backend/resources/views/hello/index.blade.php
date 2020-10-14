<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        body{
            font-size:16pt;color:#999;
        }
        h1{
            font-size:100pt;text-align:right;
            color:#6f6f6
        }
    </style>
</head>
<body>
    <h1>Blade/index</h1>

    @if ($msg != '')
    
    @endif
    <p>{{$msg}}</p>
    <form method="POST" action="/hello">
        {{ csrf_field() }}
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
</html>