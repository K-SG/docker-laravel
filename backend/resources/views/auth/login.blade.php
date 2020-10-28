<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  {{-- <%@ include file="../layout/common/link.jsp" %> --}}
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <link href="{{ asset('css/common/app.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/common/common.css') }}" rel="stylesheet" type="text/css">
  <!-- <link href="{{ asset('css/common/blackborad.css') }}" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <title>ログイン</title>
</head>
<body>
  <article>
    <div class="login">
      <div class="login_title">
        予定管理システム～くろのん～
      </div>

      <img class="logo_login" alt="ログインロゴ" src="{{ asset('img/star/logo_login.png') }}">

      <div class="login_company">
      {{--@php dd($param); @endphp --}}
        (株）くろ☆のす 
      </div>

      <form action="mylogin" method="post" class="login-form">
        @csrf
        <input type="text" name="email" id="login_mail" class="login_textbox" placeholder="メールアドレス" maxlength = "100" value="{{$email ?? ''}}"><br>
        <input type="password" name="password" id="login_pass" class="login_textbox" placeholder="パスワード" maxlength = "20"><br>
        <input type="hidden" id="flag" value="{{$popFlag ?? '0'}}">
        <input type="button" class="login-button" value="ログイン">
        <!--エラーポップアップ------------------------------------------------------------------->
      <div class="popup-wrapper error-popup">
        <div class="pop-container">
          <div class="close-popup"> <img src="{{ asset('img/close_button_orange.png') }}" alt="閉じる" class="back-button"></div>
          <div class="pop-container-inner">
            <div class="message-container">
              <p class=login_msg>メールアドレス・パスワードが違うよ！</p>
            </div>
            <div class="ok-button close-popup">OK</div>
            <img src="{{ asset('img/kronon/kronon_question.png') }}" class="pop-img kronon-question">
          </div>
        </div>
      </div>
      <!--エラーポップアップここまで-------------------------------------------------------------->
      </form>

      <div class="login_account">
        アカウントを持っていないかな？
      </div>

      <form action="register" id="next-page">
        <input type="hidden" id="preUserCount" value="">
        <input class="register-button" value="新規登録">
      </form>
  	  
    </div>
  </article>

  <script src="{{ asset('js/common/common.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>

