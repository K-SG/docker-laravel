function login_check() {

    const login_mail = document.getElementById("login_mail").value;
    const login_pass = document.getElementById("login_pass").value;
    
    //リクエストJSON
    var request = {
      login_mail : login_mail,
      login_pass : login_pass,
    };
  
    //ajaxでservletにリクエストを送信
    $.ajax({
      type    : "POST",          //GETかPOSTか
      url     : "mylogin",  //送信先のURL
      data    : request,        
      async   : true,           //true:非同期(デフォルト), false:同期
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
      success : function(data) {
        //通信が成功した場合に受け取るメッセージ

        response = data.result;
       
        if (response === 'success') {
            console.log('success');
            window.location.href=`user/calendar`;
			//return;
        } else {
            console.log('error');
            $('.error-popup').fadeIn();
			return;
        }

      },

      error : function(XMLHttpRequest, textStatus, errorThrown) {
          //エラーページに遷移させたいよ〜
            throw new AjaxException("inputScheduleAjaxError");
      }
    });
  
  }