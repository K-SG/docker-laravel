@extends('layouts.test3app')

@section('title','新規登録')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <form action="/test5_8" method="post">
        @csrf
        <table>
            <tr>
                <th>name:</th>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <th>mail:</th>
                <td><input type="text" name="mail"></td>
            </tr>
            <tr>
                <th>age:</th>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </table>
        
    </form>

@endsection


@section('footer')
    copyright 2020 benesse.
@endsection