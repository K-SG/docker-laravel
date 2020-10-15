@extends('layouts.test3app')

@section('title','Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <table>
        @foreach ($data as $item)
            <tr>
                <th>{{$item['name']}}</th>
                <td>{{$item['mail']}}</td>
            </tr>            
        @endforeach
    </table>
    <p>必要なだけ記述できます</p>


@endsection


@section('footer')
    copyright 2020 benesse.
@endsection