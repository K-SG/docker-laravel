$(function() {

	/* 登録ボタンを押した際のエラーチェックとポップアップ表示 */
	$('#ok-button').click(

		function() {

			let date = document.getElementById('date').value;
			let startHour = document.getElementById('starthour').value;
			let startMin = document.getElementById('startminutes').value;
			let endHour = document.getElementById('endhour').value;
			let endMin = document.getElementById('endminutes').value;
			let place = document.getElementById('new-place').value;
			let title = document.getElementById('title').value;
			let content = document.getElementById('content').value;
			title = title.trim();

			let d = new Date(date);
			let weekday = '日月火水木金土'[d.getDay()];
			// リリース年と月の取得
			let releaseYear = 2020;
			let releaseMonth = 8;
			// サービス終了年と月の取得
			let releaseLastYear = 2023;
			let releaseLastMonth = 7;
			// 年、月、日をそれぞれ取得
			let year = date.substring(0, 4);
			let month = date.substring(5, 7);
			let day = date.substring(8, 10);
			// 月と日付を07→7に変換
			if (month.slice(0, 1) == 0) {
				month = month.substring(1, 2);
			}
			if (day.slice(0, 1) == 0) {
				day = day.substring(1, 2);
			}
			// 月初、月末の日付を取得
			let firstDayOfMonth = new Date(year, month - 1, 1).getDate();
			let lastDayOfMonth = new Date(year, month, 0).getDate();
			// ポッププラグ変数作成
			var popFlag;
			if (startHour == '' || startMin == '' || endHour == '' || endMin == '' || place == '' || title == '') {
				popFlag = 'brank';
			} else if (date == "") {
			// 存在しない日付にした場合（2020/2/31）など
				popFlag = 'time-error';
			} else if ((startHour * 60 + startMin) - (endHour * 60 + endMin) >= 0) {
			// 終了時間よりも開始時間のほうが遅かったら
				popFlag = 'time-error';
			} else if (!(firstDayOfMonth <= day && day <= lastDayOfMonth)) {
			// 存在しない日付を入力したら（2/31など）
				popFlag = 'time-error';
			} else if (year < releaseYear || (year == releaseYear && month < releaseMonth)) {
			// リリース前の日付を選択したら
				popFlag = 'time-error';
			} else if (year > releaseLastYear || (year == releaseLastYear && month > releaseLastMonth)) {
			// サービス終了後の日付を選択したら
				popFlag = 'time-error';
			} else {
				popFlag = 'ok';
			}

			if (popFlag === 'brank') {
				$('.new-msg').html('入力されていない<br>項目があるよ！');
				$('.error-popup').fadeIn();
				return;
			} else if (popFlag === 'time-error') {
				$('.new-msg').html('日付や時間の入力が<br>おかしいよ！');
				$('.error-popup').fadeIn();
				return;
			} else if (popFlag === 'ok') {
				$('#time-msg').html(year + '/' + month + '/' + day + '('+ weekday + ')' + startHour + ':'+ startMin + '～' + endHour + ':'+ endMin);
				$('#title-msg').html(title);
				$('#content-msg').html(content);
				$('#confirm-popup2').fadeIn();
				return;
			}
	});

	/* 確認ポップアップのOKを押した際の動き */
	$('#confirm-ok').click(function() {
		schedule_insert();
		// $('.schedule-new-form').submit();
		// return;
	});

	/* 登録完了ポップアップのOKボタン押下時の遷移先 */
	$('.next-popup').click(function() {
		let date = document.getElementById('date').value;
		location.href = "calendar?date=" + date;
	});

	/* キャンセルボタンを押した際のポップアップ表示 */
	$('#cancel-button').click(function() {
		$('.cancel-popup').fadeIn();
		return;
	});

	/* ポップアップを閉じる際の動き */
	$('.close-popup').click(function() {
		$('#confirm-popup2').fadeOut();
		$('.error-popup').fadeOut();
		$('.cancel-popup').fadeOut();
		$('.complete-popup').fadeOut();
	});
});

// 20時選択したとき分のプルダウンが0に
function selectboxChange() {
	let selindex = document.form.endhour.selectedIndex;
	switch (selindex) {
	case 12:
		document.form.endminutes.selectedIndex = 0;
		document.form.endminutes.disabled = true;
		break;
	default:
		document.form.endminutes.disabled = false;
	}
}