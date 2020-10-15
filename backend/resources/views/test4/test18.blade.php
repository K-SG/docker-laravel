@extends('layouts.test3app')

@section('title','修正')

@section('menubar')
    @parent
    バリデーション
@endsection

@section('content')
    <p>{{$msg}}</p>
    @if (count($errors)>0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>                    
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/test4_18" method="post">
        @csrf
        <table>
            @if ($errors->has('name'))
            <tr>
                <th>ERROR:</th>
                <td>{{$errors->first('name')}}</td>
            </tr>
            @endif
            <tr>
                <th>name:</th>
                <td><input type="text" name="name" value="{{old('mail')}}"></td>
            </tr>
            @if ($errors->has('mail'))
            <tr>
                <th>ERROR:</th>
                <td>{{$errors->first('mail')}}</td>
            </tr>
            @endif
            <tr>
                <th>mail:</th>
                <td><input type="text" name="mail" value="{{old('mail')}}"></td>
            </tr>
            @if ($errors->has('age'))
            <tr>
                <th>ERROR:</th>
                <td>{{$errors->first('age')}}</td>
            </tr>
            @endif
            <tr>
                <th>age:</th>
                <td><input type="text" name="age" value="{{old('age')}}"></td>
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