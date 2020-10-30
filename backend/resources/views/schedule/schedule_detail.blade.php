
@extends('layouts.templateapp')

@section('title','予定詳細')
@section('link')
    @parent
    <link rel="stylesheet" href="{{ asset('css/common/blackboard.css') }}">ß
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scheduledetail.css') }}">
    @endsection


@section('header')
    @parent
@endsection

@section('body')

<article>
    <div class=white-text>
      <div class=blackboard>
        <table class=schedule_detail>
          <tr>
            <td>名前 : {{ Auth::user()->name }}</td>
            <td id = "actual-time-z"></td>
          </tr>
          <tr>
            <td>日時：{{$db_items->schedule_date}}
              <span id="startTime">{{$db_items->start_time}} </span>～
              <span id="endTime">{{$db_items->end_time}} </span>
            </td>
  
            <!-- 作業場所に応じて色変化 -->
            @if ($db_items->place == '0')
                <td class=show-place1>場所：オフィス</td>
            @endif
            @if ($db_items->place =='1')
                <td class=show-place2>場所：在宅</td>
            @endif
            @if ($db_items->place =='2')
                <td class=show-place3>場所：外出</td>
            @endif  
          </tr>
  
          <tr>
            <td class="new-line" colspan="2">タイトル：{{$db_items->title}}</td>
          </tr>
  
          <tr>
            <td class="new-line" colspan="2">内容：{{$db_items->content}}</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- くろのんの画像 -->
    <div class="kronon-banzai"><img alt="banzai" src={{ asset('img/kronon/kronon_banzai.png')}}></div>
  
    <!-- 戻るボタン -->
  <div><a href="scheduleshowall?date={{$db_items->schedule_date}}"><img src={{ asset('img/back_buttom.png')}} alt="戻る" class="back-btn"></a></div>
    @if (Auth::user()->id == $db_items->id)
        <div class="flex_test-box">
        <div class="flex_test-item">
        <a href="scheduleedit?scheduleId={{$db_items->id}}"><div class="ok-button">修正</div></a>
        </div>
        <div class="flex_test-item">
          <div class="ok-button large-popup-button" id="{{$popFlag ?? '0'}}">削除</div>
        </div>
      </div>   
    @endif  
    <!--内容確認ポップアップ----------------------------------------------------------------->
    <div class="popup-wrapper confirm-popup">
      <div class="pop-container pop-container-large">
        <div class="close-popup"><img src={{asset('img/close_button_orange.png')}} alt="閉じる" class="back-button"></div>
        <div class="pop-container-inner">
          <div class="message-container-large">
            <h2 class="message-title">この内容を本当に削除する？</h2>
            <table class="popup-table">
              <tr>
                <th class="th">名前：</th>
                <td>{{$db_items->name}}</td>
              </tr>
              <tr>
                <th>予定日時：</th>
                <td>{{$db_items->schedule_date}}
                  <span id="startTimee">{{$db_items->start_time}} </span>～
                  <span id="endTimee">{{$db_items->end_time}}</span>
                </td>
              </tr>
              <tr>
                <th>タイトル：</th>
                <td class="new-line"><span class="actual-input-area-4">{{$db_items->title}}</span></td>
              </tr>
              <tr>
                <th class="last-table">内容：</th>
                <td class="last-table new-line">
                  <span class="actual-input-area-4">{{$db_items->content}}</span>
                </td>
              </tr>
            </table>
          </div>
          <form action="scheduledelete" method="post" id="schedule-delete-form">
            @csrf
            <input type="hidden" id="flag" value="{{$popFlag ?? '0'}}">
            <input type="hidden" name="scheduleId" value="{{$db_items->id}}">
            <input type="hidden" name="userName" value="{{$db_items->name}}">
            <input type="hidden" name="startTime" value="{{$db_items->start_time}}">
            <input type="hidden" name="endTime" value="{{$db_items->end_time}}">
            <input type="hidden" name="place" value="{{$db_items->place}}">
            <input type="hidden" name="title" value="{{$db_items->title}}">
            <input type="hidden" name="content" value="{{$db_items->content}}">
            <input type="hidden" name = "scheduleDate" value="{{$db_items->schedule_date}}">
            <div class="ok-button" id="schedule-delete-action">OK</div>
            <div class="ng-button close-popup">キャンセル</div>
            <img src="{{asset('img/star/star_nomal.png')}}" class="pop-large-img-top star-nomal">
          </form>
        </div>
      </div>
    </div>
    <!--内容確認ポップアップここまで----------------------------------------------------------------->
  
    <!--削除完了ポップアップ------------------------------------------------------------------->
    <div class="popup-wrapper error-popup complete-popup">
      <div class="pop-container">
        <div class="pop-container-inner">
          <div class="message-container">
            <p class=create-msg>削除が完了したよ！</p>
          </div>
          <a href="scheduleshowall?date={{$db_items->schedule_date}}"><div class="ok-button next-popup">OK</div></a>
          <img src="{{asset('img/kronon/kronon_star.png')}}" class="pop-img kronon-star">
        </div>
      </div>
    </div>
    <!--削除完了ポップアップここまで-------------------------------------------------------------->
  
  </article>
@endsection


@section('footer')
    @parent   
@endsection

@section('js_link')
    @parent
    <script src="{{ asset('js/common/common.js') }}"></script>
    <script src="{{ asset('js/schedule_detail.js') }}"></script>
@endsection