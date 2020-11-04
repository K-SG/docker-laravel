$(function () {

	$('.schedule-item').hover(
			function(){
				$(this).addClass('cell-active');
			},
			function(){
				$(this).removeClass('cell-active');
			}
	)

	$('.schedule-item').click(function(){
		var id = $(this).children('.schedule_id').text();
		window.location.href = '../user/scheduledetail?schedule_id=' + id;
	})

	//前日へ
	$('#left').click(function(){
		const display_date_str = document.getElementById("scheduleDate").value;
		const display_date = new Date(display_date_str);
		display_date.setDate(display_date.getDate() - 1);
		const return_date = display_date.getFullYear() 
		+ '-' + ('00' + (display_date.getMonth()+1)).slice(-2)
		+ '-' + ('00' + display_date.getDate()).slice(-2); 
		window.location.href=`scheduleshowall?date=${return_date}`;
	})

	//翌日へ
	$('#right').click(function(){
		const display_date_str = document.getElementById("scheduleDate").value;
		const display_date = new Date(display_date_str);
		display_date.setDate(display_date.getDate() + 1);
		const return_date = display_date.getFullYear() 
		+ '-' + ('00' + (display_date.getMonth()+1)).slice(-2)
		+ '-' + ('00' + display_date.getDate()).slice(-2); 
		window.location.href=`scheduleshowall?date=${return_date}`;
	})

});