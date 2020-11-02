<html>
<head>
    <title>@yield('title')</title>
    @section('link')
    <link href="{{ asset('css/common/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/common/common.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/common/blackboard.css') }}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    @show
</head>
<body>
    @section('header')
    <header>
        <div class="content">
          <ul class="top-head">
            <li class="system-name"><a href="calendar">予定管理システム　～くろのん～</a></li>
            <li class="company-name"><img class="top-head-image" alt="くろ☆のすロゴ" src="{{ asset('img/star/logo_header.png') }}">（株）くろ☆のす</li>
          </ul>
          <ul class="nav">
            <li><a href="calendar">予定確認</a></li>
            <li><a href="input_schedule">予定登録</a></li>
            <li><a href="actualindex">実績確認</a></li>
            <div class="nav-right">
              <div class="nav-right-img">
                <a type="button" class="logout-button"><img class="logout-icon" alt="ログアウト" src="{{ asset('img/logout_icon.png') }}"></a>
              </div>
              <div class="nav-right-user">{{ Auth::user()->name }}としてログイン中</div>
              <div class="nav-right-user" aria-labelledby="navbarDropdown">
             </div>
            </div>
          </ul>
        </div>
        <div class="popup-wrapper back-popup">
          <div class="pop-container">
            <div class="close-popup"> <img src="{{ asset('img/close_button_orange.png') }}" alt="閉じる" class="back-button"> </div>
            <div class="pop-container-inner">
              <div class="message-container">
                <p> </p><br>
                <h2 class="message-title">本当にログアウトする？</h2>
              </div>
              <a href="../mylogout"
                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                <span class="ok-button">OK</span>

                <form id="logout-form" action="../mylogout" method="POST" class="d-none">
                @csrf
                </form>
              </a>
              <div class="ng-button close-popup">キャンセル</div>
              <img src="{{ asset('img/star/star_angry.png') }}" class="pop-img-top">
            </div>
            </div>
        </div>
    </header>
    @show

    <body>
        @section('body')
        @show
    </body>

    @section('footer')
    <footer>
        <small>&copy; 2020 Benesse.</small>
    </footer>   
    @show

    @section('js_link')    
        <script src="{{ asset('js/logout.js') }}"></script>
        <script src="{{ asset('js/common/common.js') }}"></script>
    @show

</body>
</html>