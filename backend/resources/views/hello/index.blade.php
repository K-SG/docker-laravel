@extends('layouts.helloapp')
@section('title','Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <table>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
        @endforeach
    </table>
@endsection
@section('footer')
    copyright 2020 tuyano.....
@endsection

{{-- <!DOCTYPE html>
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
</head> --}}
{{-- <body>
    <h1>Blade/index</h1>
    <p>whileディレクティブ</p>
    <ol>
    @php
    $counter = 0
    @endphp
    @while($counter < count($data))
    <li>{{$data[$counter]}}</li>
    @php
    $counter++;
    @endphp
    @endwhile
    </ol>
    {{-- @if ($msgii != '')
    <p>こんにちは！{{$msgii}}さん</p>
    @else
    <p>何か書いてください</p>
    @endif --}}
    {{-- <p>&#064;foreachexample</p>
    <ul>
    @foreach($data as $item)
    @if($loop -> first)
    <p>*データ一覧</p>
    @endif
    <li>No,{{$loop->iteration}},{{$item}}</li>
    @if($loop->last)
    </ul><p>---ここまで</p>
    @endif
    @endforeach
    <ol>
        @for($i = 1;$i < 100;$i++)
        @if($i % 2 == 1)
        @continue
        @elseif($i <= 10)
        <li>No,{{$i}}
        @else
            @break
        @endif
        @endfor
    </ol>
    <ol> --}}
    {{-- <?php $data2 = [1,2,3,4];?> --}}
    {{-- @foreach($data as $item)
    <li>{{$item}}
    @endforeach
    </ol>

    @isset($msgii)
    <p>こんにちは！{{$msgii}}さん</p>
    @else
    <p>何か書いてください</p>
    @endisset --}}

    {{-- <p>{{$msg}}</p> --}}
    {{-- <form method="POST" action="/hello">
        @csrf
        <input type="text" name="msg">
        <input type="submit">
    </form>
</body>
</html> --}} 