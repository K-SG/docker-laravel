
$(function () {

    const date_display = document.getElementById("today").value;
    const year = document.getElementById("year").textContent; //2020
    const month = document.getElementById("month").textContent ; ; //7
    let holiday_flag = 0;//祝日だけホバーがきかないのでflagで対応

	$('td').hover(
		function(){
			if($(this).hasClass('disabled')){
				return;
			}
			if($(this).hasClass('holiday')){
				holiday_flag = 1;
				$(this).removeClass('holiday');
			}
			$(this).addClass('cell-active');
		},
		function(){
			$(this).removeClass('cell-active');
			if(holiday_flag===1){
				$(this).addClass('holiday');
				holiday_flag=0;
			}
		}
	)

	$('td').click(function(){
		if($(this).hasClass('disabled')){
			return;
		}

		var date = $(this).children('.date').text();

		//一桁の場合は0うめ
		let date_0;
		if(date < 10){
			date_0 = "0"+date;
		}else{
			date_0 = date;
		}
		let date_submit = date_display.slice(0,-2) + date_0;
		window.location.href=`schedule_show_all?date=${date_submit}`;//calendar.html

	})

	//先月へ
	$('.left').click(function(){
		const display_date_str = document.getElementById("today").value;
		const display_date = new Date(display_date_str);
		display_date.setMonth(display_date.getMonth() - 1);
		const return_date = display_date.getFullYear() 
			+ '-' + ('00' + (display_date.getMonth()+1)).slice(-2)
			+ '-' + ('00' + display_date.getDate()).slice(-2); 
		window.location.href=`calendar?date=${return_date}`;
	})
	//翌月へ
	$('.right').click(function(){
		const display_date_str = document.getElementById("today").value;
		const display_date = new Date(display_date_str);
		display_date.setMonth(display_date.getMonth() + 1);
		const return_date = display_date.getFullYear() 
			+ '-' + ('00' + (display_date.getMonth()+1)).slice(-2)
			+ '-' + ('00' + display_date.getDate()).slice(-2); 
		window.location.href=`calendar?date=${return_date}`;
	})

});