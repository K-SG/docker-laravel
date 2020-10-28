"use strict";
const POPUP_FLAG_COMPLETED = 1;
const POPUP_FLAG_MAIL_DUPLICATED = 2;
const POPUP_FLAG_NONE = 0;
/*DBと照合した後のエラーポップアップ表示*/
$(document).ready(function () {
	let popFlag = document.getElementById("flag").value;
    /*メールアドレスがすでに登録されていた場合*/
    if (popFlag == POPUP_FLAG_MAIL_DUPLICATED) {
		$(".create-popup").fadeIn();
        return;
	}
	if (popFlag == POPUP_FLAG_COMPLETED) {
		$(".create-msg").html("登録が完了したよ！");
		$(".complete-popup").fadeIn();
		return;
	}	
    /*新規登録ボタンを押下した際のエラーチェックとポップアップ表示*/
    $(".user-create-button").click(function () {
		let userName = document.getElementById("create_name").value;
		let mail = document.getElementById("create_mail").value;
		let password1 = document.getElementById("create_password1").value;
		let password2 = document.getElementById("create_password2").value;
		let inputUserInformation = {userName:userName,mail:mail,password1:password1,password2:password2};
		if (!isValid(inputUserInformation)) {
            return;
        }
        showConfirmPopup();
    });
	/*ポップアップを閉じる*/
	$(".close-popup").click(function () {
		$(".confirm-popup").fadeOut();
		$(".error-popup").fadeOut();
		$(".back-popup").fadeOut();
		$(".create-popup").fadeOut();
	});
	/*登録完了ポップアップのOKボタン押下時の遷移先*/
	$("#submit-user").click(function () {
		$("#id_create_form").submit();
		return;
	});
	function showConfirmPopup() {
		/*表示名の値をセット*/
		let nameText = document.getElementById("confirmUserName");
		nameText.innerText = document.forms.id_create_form.create_name.value;
		/*メールの値をセット*/
		let mailText = document.getElementById("confirmMail");
		mailText.innerText = document.forms.id_create_form.create_mail.value;
		/*パスワードの値をセット*/
		let passwordText = document.getElementById("confirmPassword");
		/*パスワードの字数を取得*/
		let tmp = document.forms.id_create_form.create_password1.value.length;
		var str = "";
		for (var i = 0; i < tmp; i++) {
			str += "＊";
		}
		passwordText.innerText = str;
		$(".confirm-popup").fadeIn();
		$("user-create-form").submit();
		return;
	}
	/*以下エラーチェック*/
    function isValidAllRequired(inputUserInformation) {
        if (
			inputUserInformation.userName.trim() == "" ||
            inputUserInformation.mail == "" ||
            inputUserInformation.password1 == "" ||
            inputUserInformation.password2 == ""
			) {
				return false;
			}
        return true;
    }
    function isValidMail(inputUserInformation) {
        if (!inputUserInformation.mail.match(/^[A-Za-z0-9]+[\w\-_]+@[\w\._]+\.\w{2,}$/)) {
            return false;
        }
        return true;
    }
    function isValidPassword(inputUserInformation) {
        if (
            inputUserInformation.password1.length < 8 ||
            !(
                inputUserInformation.password1.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/) &&
                inputUserInformation.password1.match(/([0-9])/)
            ) ||
            !(inputUserInformation.password1.match(/([a-zA-Z])/) && inputUserInformation.password1.match(/([0-9])/))
        ) {
            return false;
        }
        return true;
    }
    function isValidPasswordConfirm(inputUserInformation) {
        if (inputUserInformation.password1 !== inputUserInformation.password2) {
            return false;
        }
        return true;
    }

    function isValid(inputUserInformation) {
        if (!isValidAllRequired(inputUserInformation)) {
            $(".create-msg").html("入力されていない<br>項目があるよ！");
            $(".create-popup").fadeIn();
            return;
        }
        if (!isValidMail(inputUserInformation)) {
            $(".create-msg").html("メールアドレスが<br>不正だよ！");
            $(".create-popup").fadeIn();
            return;
        }
        if (!isValidPassword(inputUserInformation)) {
            $(".create-msg").html("パスワードの条件を<br>満たしていないよ！");
            $(".create-popup").fadeIn();
            return;
        }
        if (!isValidPasswordConfirm(inputUserInformation)) {
            $(".create-msg").html("パスワードが<br>一致していないよ！");
            $(".create-popup").fadeIn();
            return;
        }
        return true;
    }
	
});
