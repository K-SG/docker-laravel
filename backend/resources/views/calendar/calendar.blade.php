
@extends('layouts.templateapp')

@section('title','予定確認')
@section('link')
    @parent
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@endsection


@section('header')
    @parent
@endsection

@section('body')

    <script>
        // 表示する年月の取得
        let year = {{ $period['year'] }}; // 2020
        let month = {{ $period['month'] }} -1; // 7-1
    </script>


    <article>
 
    <input type="hidden" id="list" value="{{$schedule_list}}">

    <div class="calendar-container">
        <div class="calendar-container-inner">
        <div class="calendar-title">
            <div class="title-content">
                <img src="{{ asset('img/left_button.png') }}" alt="left" id="left" class="left triangle-button">
            </div>
            <div class="title-content">
                <h2 id="month">
                {{$period['month']}}
                </h2>
            </div>
            <div class="title-content">
                <h3 id="year">
                {{$period['year']}}                
                </h3>
            </div>
            <div class="title-content">
                <img src="{{ asset('img/right_button.png') }}" alt="right" id="right" class="right triangle-button">
            </div>
            <div class="clear"></div>
        </div>
        <table class="calendar">
            <thead>
            <tr class="youbi">
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="kronon-speak-container">
            <div class="kronon-speak">
            <div class="arrow-container">
                <div class="arrow_box" id="kronon-message"></div>
            </div>
            <img src="{{ asset('img/kronon/kronon_prin.png') }}" class="kronon-img">
            </div>
        </div>
        </div>

        <input type="hidden" id="today" value="{{$period['date']}}">

    </div>
    </article>
    
@endsection


@section('footer')
    @parent   
@endsection

@section('js_link')
    @parent
    <script src="{{ asset('js/calendar.js') }}"></script>
    <script src="{{ asset('js/calendar_event.js') }}"></script>
@endsection