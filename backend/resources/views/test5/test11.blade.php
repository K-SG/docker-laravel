@extends('layouts.test3app')

@section('title','修正')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <form action="/test5_11" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <table>
            <tr>
                <th>name:</th>
                <td><input type="text" name="name" value="{{$form->name}}"></td>
            </tr>
            <tr>
                <th>mail:</th>
                <td><input type="text" name="mail" value="{{$form->mail}}"></td>
            </tr>
            <tr>
                <th>age:</th>
                <td><input type="text" name="age" value="{{$form->age}}"></td>
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