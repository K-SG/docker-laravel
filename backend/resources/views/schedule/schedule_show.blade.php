
@extends('layouts.templateapp')

@section('title','予定一覧')
@section('link')
    @parent
    <link rel="stylesheet" href="{{ asset('css/schedule_table.css') }}">
@endsection


@section('header')
    @parent
@endsection

@section('body')

    {{-- <script>
        // 表示する年月の取得
        let year = {{ $period['year'] }}; // 2020
        let month = {{ $period['month'] }} -1; // 7-1
    </script>


    <article>
 
    <input type="hidden" id="list" value="{{$schedule_list}}">

    <div class="calendar-container">
        <div class="calendar-container-inner">
        <div class="calendar-title">
            <form action="calendar" method="get" id="left-form">
            @csrf
            <input type="hidden" name="flag" value="0">
            <input type="hidden" name="month_counter" value="{{$month_counter-1}}">
            <div class="title-content">
                <img src="{{ asset('img/left_button.png') }}" alt="left" id="left" class="left triangle-button">
            </div>
            </form>
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
            <form action="calendar" method="post" id="right-form">
            @csrf
            <input type="hidden" name="month_counter" value="{{$month_counter+1}}">
            <div class="title-content">
                <img src="{{ asset('img/right_button.png') }}" alt="right" id="right" class="right triangle-button">
            </div>
            </form>
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
    </div>
    <input type="hidden" id="date_servlet"  value='${date}' style="display:none">
    </article> --}}




    <article class="article">

        <form action="scheduleshowall" method="post" id="left-form">
        <input type="hidden" name="flag" value="0">
        <input type="hidden" id="scheduleDate" name="scheduleDate" value="${scheduleDate}">
        <div class="left-button-container">
            <img src="{{ asset('img/left_button.png') }}" alt="left" id="left" class="left triangle-button">
        </div>
        </form>
        <div class="blackboard-container">
        <div class="blackboard-inner">
            <div class="blackboard-head">
            <div class="today-list"><c:out value="${displayDate}"/>の予定</div>
            <div class="hanrei">
                <div class="hanrei-item hanrei-item1"></div>: オフィス
                <div class="hanrei-item hanrei-item2"></div>: 在宅
                <div class="hanrei-item hanrei-item3"></div>: 外出
            </div>
            </div>
            <div id="blackboard-table">
            <div id="name-container"></div>
            </div>
        </div>

        </div>
        <form action="scheduleshowall" method="post" id="right-form">
        <input type="hidden" name="flag" value="1">
        <input type="hidden" name="scheduleDate" value="${scheduleDate}">
        <div class="title-content">
            <img src="{{ asset('img/right_button.png') }}" alt="right" id="right" class="right triangle-button">
        </div>
        </form>

        <div><a href="calendar"><img src="{{ asset('img/back_buttom.png') }}" alt="back-buttom" class="back-btn"></a></div>

        <input type="hidden" id="list" value='${json}' style="display:none">
        <input type="hidden" id="name-list" value='${json_name}' style="display:none">

    </article>

    
@endsection


@section('footer')
    @parent   
@endsection

@section('js_link')
    @parent
    <script src="{{ asset('js/schedule_show.js') }}"></script>
    <script src="{{ asset('js/schedule_show_event.js') }}"></script>
@endsection