function schedule_insert() {

    const schedule_date = document.getElementById("date").value;
    const start_hour = document.getElementById("starthour").value;
    const start_minutes = document.getElementById("startminutes").value;
    const end_hour = document.getElementById("endhour").value;
    const end_minutes = document.getElementById("endminutes").value;
    const new_place = document.getElementById("new-place").value;
    const title = document.getElementById("title").value;
    const content = document.getElementById("content").value;
    
    //リクエストJSON
    var request = {
      schedule_date : schedule_date,
      start_hour : start_hour,
      start_minutes : start_minutes,
      end_hour : end_hour,
      end_minutes : end_minutes,
      new_place : new_place,
      title : title,
      content : content,
    };
  
    //ajaxでservletにリクエストを送信
    $.ajax({
      type    : "POST",          //GETかPOSTか
      url     : "schedule_create",  //送信先のURL
      data    : request,        //jsonを渡す
      async   : true,           //true:非同期(デフォルト), false:同期
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
      success : function(data) {
        //通信が成功した場合に受け取るメッセージ

        $('#confirm-popup2').fadeOut();

        response = data.result;
       
        if (response === 'success') {
            console.log('success');
            $('.create-msg').html('登録が完了したよ！');
			$('.complete-popup').fadeIn();
			return;
        } else if (response === 'booking') {
            console.log('booking');
            $('.new-msg').html('予定がかぶってるよ！');
			$('.error-popup').fadeIn();
			return;
        } else {
            console.log('error');
            $('.new-msg').html('エラーが発生したよ。');
			$('.error-popup').fadeIn();
			return;
        }

      },

      error : function(XMLHttpRequest, textStatus, errorThrown) {
          //エラーページに遷移させたいよ
          throw new AjaxException("inputScheduleAjaxError");
          //window.location.href=`error`;
            
      }
    });
  
  }