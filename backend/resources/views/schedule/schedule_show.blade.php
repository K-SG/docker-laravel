
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

    <article class="article">

        <form action="schedule_show_all" method="post" id="left-form">
          @csrf
          <input type="hidden" name="date" value="{{ $period['date'] }}">
          <input type="hidden" name="flag" value="left">
          <div class="left-button-container">
              <img src="{{ asset('img/left_button.png') }}" alt="left" id="left" class="left triangle-button">
          </div>
        </form>

        <div class="blackboard-container">
          <div class="blackboard-inner">
              <div class="blackboard-head">
              <div class="today-list">{{ $period['date_display'] }}の予定</div>
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

        <form action="schedule_show_all" method="post" id="right-form">
          @csrf
          <input type="hidden" name="date" value="{{ $period['date'] }}">
          <input type="hidden" name="flag" value="right">
          <div class="title-content">
              <img src="{{ asset('img/right_button.png') }}" alt="right" id="right" class="right triangle-button">
          </div>
        </form>

        <div>
          <a href="calendar">
            <img src="{{ asset('img/back_buttom.png') }}" alt="back-buttom" class="back-btn">
          </a>
        </div>

        <input type="hidden" id="list" value="{{ $schedule_list }}" style="display:none">
        <input type="hidden" id="name-list" value='{{ $user_list }}' style="display:none">
        <input type="hidden" id="scheduleDate" value="{{ $period['date'] }}">

    </article>

    
@endsection


@section('footer')
    @parent   
@endsection

@section('js_link')
    @parent
    <script type="text/javascript" src="{{ asset('js/schedule_show.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/schedule_show_event.js') }}"></script>
@endsection