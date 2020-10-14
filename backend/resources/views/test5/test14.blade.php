@extends('layouts.test3app')

@section('title','削除')

@section('menubar')
    @parent
    削除したいページ
@endsection

@section('content')
    <form action="/test5_14" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <table>
            <tr>
                <th>id:</th>
                <td>{{$form->id}}</td>
            </tr>
            <tr>
                <th>name:</th>
                <td>{{$form->name}}</td>
            </tr>
            <tr>
                <th>mail:</th>
                <td>{{$form->mail}}</td>
            </tr>
            <tr>
                <th>age:</th>
                <td>{{$form->age}}</td>
            </tr>
        </table>
        <input type="submit" value="delete">
    
    </form>

@endsection


@section('footer')
    copyright 2020 benesse.
@endsection