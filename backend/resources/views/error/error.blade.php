@extends('layouts.templateapp')

@section('link')
    @parent
    <link href="{{ asset('css/error.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title','エラー')

@section('body')
    <article>
        <div id="error-msg">問題が発生しちゃったよ。もう一度やり直してみてね。</div>
        <img alt="エラーロゴ" id="error-img" src="{{ asset('img/kronon/kronon_komatta.png') }}">
    </article>
@endsection

@section('footer')

@section('js_link')