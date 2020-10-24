<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="{{ asset('css/user_new.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/common/common.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<head>
<title>アカウント作成</title>
</head>
<body>
	<article>
		<div class="create-user-content">
			<div class="create-user-system-name">予定管理システム～くろのん～</div>
			<div class="create-user-title">アカウント作成</div>
			<div class="create-user-note">表示名は日本語で15文字以内、パスワードは半角英数字で8～20文字、<br>大文字・小文字・数字を必ず使用して設定してください。</div>

			<form action="{{ route('register') }}" method="post" class="user_create_form" id="id_create_form" >
				@csrf
				<input type="text" name="name" id="create_name" class="create_textbox" placeholder="表示名" maxlength="15" value={{old('name')}}><br>
				<input type="text" name="email" id="create_mail" class="create_textbox" placeholder="メールアドレス" maxlength="100" value={{old('email')}}><br>
				<input type="password" name="password" id="create_password1" class="create_textbox" placeholder="パスワード" maxlength="20" value={{old('password')}}><br>
				<input type="password" name="password_confirmation" id="create_password2" class="create_textbox" placeholder="パスワード確認" maxlength="20" value={{old('password')}}><br>
				<input type="hidden" id="flag" value="{{$popFlag}}"> 
				<input type="button" class="user-create-button" value="新規登録">
				<!--エラーポップアップ------------------------------------------------------------------->
				<div class="popup-wrapper error-popup create-popup">
					<div class="pop-container">
						<div class="close-popup"><img src="{{ asset('img/close_button_orange.png') }}" alt="閉じる" class="back-button"></div>
						<div class="pop-container-inner">
							<div class="message-container"><p class=create-msg>メールアドレスが<br>既に登録されているよ！</p></div>
							<div class="ok-button close-popup">OK</div>
							<img src="{{ asset('img/kronon/kronon_question.png') }}" class="pop-img kronon-question">
						</div>
					</div>
				</div>
				<!--エラーポップアップここまで-------------------------------------------------------------->

				<!--登録完了ポップアップ------------------------------------------------------------------->
				<div class="popup-wrapper error-popup complete-popup">
					<div class="pop-container">
						<div class="close-popup"><img src="{{ asset('img/close_button_orange.png') }}" alt="閉じる" class="back-button"></div>
						<div class="pop-container-inner">
							<div class="message-container"><p class=create-msg></p></div>
							<div class="ok-button next-popup">OK</div>
							<img src="{{ asset('img/kronon/kronon_star.png') }}" class="pop-img kronon-star">
						</div>
					</div>
				</div>
				<!--登録完了ポップアップここまで-------------------------------------------------------------->

				<!--内容確認ポップアップ---------------------------------------------------------------->
				<div class="popup-wrapper confirm-popup">
					<div class="pop-container pop-container-large">
						<div class="close-popup"><img src="{{ asset('img/close_button_orange.png') }}" alt="閉じる" class="back-button"></div>
						<div class="pop-container-inner">
							<div class="message-container-large">
								<h2 class="message-title">この内容で登録するよ！</h2>
								<table class="popup-table">
									<tr>
										<th class="th">表示名：</th>
										<td><div id="confirmUserName"></div></td>
									</tr>
									<tr>
										<th>メールアドレス：</th>
										<td  class="confirmMailView"><span ><div id="confirmMail"></div></span></td>
									</tr>
									<tr>
										<th>パスワード：</th>
										<td><div id="confirmPassword"></div></td>
									</tr>
								</table>
							</div>
							<div class="ok-button large-pop-ok-buttom" id="submit-user">OK</div>
							<div class="ng-button close-popup large-pop-ok-buttom">キャンセル</div>
							<img src="{{ asset('img/star/star_nomal.png') }}" class="pop-large-img-top star-nomal">
						</div>
					</div>
				</div>
			</form>
			<!--内容確認ポップアップここまで----------------------------------------------------------------->

			<!--本当に戻りますかポップアップ------------------------------------------------------------------->
			<div class="popup-wrapper back-popup">
				<div class="pop-container">
					<div class="close-popup">
						<img src="{{ asset('img/close_button_orange.png') }}" alt="閉じる" class="back-button">
					</div>
					<div class="pop-container-inner">
						<div class="message-container">
							<p>内容は保存されないよ！</p>
							<h2 class="message-title">本当に戻る？</h2>
						</div>
						<a href="/login"><div class="ok-button">OK</div></a>
						<div class="ng-button close-popup">キャンセル</div>
						<img src="{{ asset('img/star/star_angry.png') }}" class="pop-img-top star-angry">
					</div>
				</div>
			</div>
			<!--本当に戻りますかポップアップここまで------------------------------------------------------------------->
		</div>
		<div class="user-create-button-return"><img alt="戻る" src="{{ asset('img/back_buttom.png') }}" class="back-popup-button"></div>
	</article>

    <script src="{{ asset('js/user_new.js') }}"></script>
    <script src="{{ asset('js/common/common.js') }}"></script>
</body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
