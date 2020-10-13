@extends('layouts.test3app')

@section('title','Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです</p>
    <p>必要なだけ記述できます</p>

    @component('components.message')
        @slot('msg_title')
            CAUTION!
        @endslot

        @slot('msg_content')
            気をつけてね
        @endslot
        
    @endcomponent

@endsection


@section('footer')
    copyright 2020 benesse.
@endsection