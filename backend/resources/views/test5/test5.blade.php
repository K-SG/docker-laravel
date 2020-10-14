@extends('layouts.test3app')

@section('title','一覧')

@section('menubar')
    @parent
@endsection

@section('content')
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>mail</th>
            <th>age</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->mail}}</td>
                <td>{{$item->age}}</td>
            </tr>
        @endforeach
    </table>


@endsection


@section('footer')
    copyright 2020 benesse.
@endsection