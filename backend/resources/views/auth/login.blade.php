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
      <p>{{$message ?? ''}}</p>
        <!-- （株）くろ☆のす -->
      </div>

      <form action="login" method="post" class="login-form">
        @csrf
        <input type="text" name="email" id="login_mail" class="login_textbox" placeholder="メールアドレス" maxlength = "100" value="{{old('mail')}}"><br>
        <input type="password" name="password" id="login_pass" class="login_textbox" placeholder="パスワード" maxlength = "20"><br>
        <input type="hidden" id="flag" value="${popFlag}">
        <input type="button" class="login-button" value="ログイン">
      </form>

      <div class="login_account">
        アカウントを持っていないかな？
      </div>

      <form action="usernew" id="next-page">
        <input type="hidden" id="preUserCount" value="">
        <input class="register-button" value="新規登録">
      </form>


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
    </div>
  </article>

  <script src="{{ asset('js/common/common.js') }}"></script>
  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
