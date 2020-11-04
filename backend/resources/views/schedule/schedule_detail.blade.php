
@extends('layouts.templateapp')

@section('title','予定詳細')
@section('link')
    @parent
    <link rel="stylesheet" href="{{ asset('css/scheduledetail.css') }}" type="text/css">
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
            <td>名前 : {{ $schedule->name }}</td>
            <td id = "actual-time-z"> - </td>
          </tr>
          <tr>
            <td>日時：{{$schedule->schedule_date}}
              <span id="startTime">{{$schedule->start_time}} </span>～
              <span id="endTime">{{$schedule->end_time}} </span>
            </td>
  
            <!-- 作業場所に応じて色変化 -->
            @if ($schedule->place == '0')
                <td class=show-place1>場所：オフィス</td>
            @endif
            @if ($schedule->place =='1')
                <td class=show-place2>場所：在宅</td>
            @endif
            @if ($schedule->place =='2')
                <td class=show-place3>場所：外出</td>
            @endif  
          </tr>
  
          <tr>
            <td class="new-line" colspan="2">タイトル：{{$schedule->title}}</td>
          </tr>
  
          <tr>
            <td class="new-line" colspan="2">内容：{{$schedule->content}}</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- くろのんの画像 -->
    <div class="kronon-banzai"><img alt="banzai" src={{ asset('img/kronon/kronon_banzai.png')}}></div>
  
    <!-- 戻るボタン -->
  <div><a href="scheduleshowall?date={{$schedule->schedule_date}}"><img src={{ asset('img/back_buttom.png')}} alt="戻る" class="back-btn"></a></div>
    @if (Auth::user()->id == $schedule->user_id)
        <div class="flex_test-box">
        <div class="flex_test-item">
        <a href="scheduleedit?scheduleId={{$schedule->id}}"><div class="ok-button">修正</div></a>
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
                <td>{{$schedule->name}}</td>
              </tr>
              <tr>
                <th>予定日時：</th>
                <td>{{$schedule->schedule_date}}
                  <span id="startTimePopup">{{$schedule->start_time}} </span>～
                  <span id="endTimePopup">{{$schedule->end_time}}</span>
                </td>
              </tr>
              <tr>
                <th>タイトル：</th>
                <td class="new-line"><span class="actual-input-area-4">{{$schedule->title}}</span></td>
              </tr>
              <tr>
                <th class="last-table">内容：</th>
                <td class="last-table new-line">
                  <span class="actual-input-area-4">{{$schedule->content}}</span>
                </td>
              </tr>
            </table>
          </div>
          <form action="scheduledelete" method="post" id="schedule-delete-form">
            @csrf
            <input type="hidden" id="flag" value="{{$popFlag ?? '0'}}">
            <input type="hidden" name="scheduleId" value="{{$schedule->id}}">
            <input type="hidden" name="userName" value="{{$schedule->name}}">
            <input type="hidden" name="startTime" value="{{$schedule->start_time}}">
            <input type="hidden" name="endTime" value="{{$schedule->end_time}}">
            <input type="hidden" name="place" value="{{$schedule->place}}">
            <input type="hidden" name="title" value="{{$schedule->title}}">
            <input type="hidden" name="content" value="{{$schedule->content}}">
            <input type="hidden" name = "scheduleDate" value="{{$schedule->schedule_date}}">
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
          <a href="scheduleshowall?date={{$schedule->schedule_date}}"><div class="ok-button next-popup">OK</div></a>
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
    <script src="{{ asset('js/schedule_detail.js') }}"></script>
@endsection