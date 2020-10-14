@extends('layouts.test3app')

@section('title','削除')

@section('menubar')
    @parent
@endsection

@section('content')
<form action="test5_14" method="get">  
    削除したいIDを入力してください
    <input type="text" name="id">
    <input type="submit" value="検索">
</form>  


@endsection


@section('footer')
    copyright 2020 benesse.
@endsection