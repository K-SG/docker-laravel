@extends('layouts.test3app')

@section('title','Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>

    <p>これは、<middleware>google.com</middleware>へのリンクです</p>
    <p>これは、<middleware>yahoo.cp.jp</middleware>へのリンクです</p>

@endsection


@section('footer')
    copyright 2020 benesse.
@endsection