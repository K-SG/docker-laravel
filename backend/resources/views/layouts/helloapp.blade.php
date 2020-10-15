<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        body{font-size: 16pt;color: blueviolet;margin: 5px;}
        h1{font-size: 50pt;text-align: right;color: aquamarine;
            margin: -20px 0px -30px 0px;letter-spacing: -4px;}
        hr{border-top: 1px dashed #ddd}
        .menutitle{font-size: 14pt; font-weight:bold;}
        .content{margin: 10px;}
        .footer{text-align: :right;font-size:10pt;}
    </style>
</head>
<body>
    <h1>@yield('title')</h1>
    @section('menubar')
    <h2 class="menutitle">*メニュー</h2>
    <ul>
        <li>@show</li>
    </ul>
    <hr size="1">
    <div class="content">
    @yield('content')
    </div>
    <div class="footer">
    @yield('footer')
    </div>
</body>
</html>