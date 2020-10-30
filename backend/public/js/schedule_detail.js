$(function () {
    let startTime = document.getElementById("startTime").textContent;
    let endTime = document.getElementById("endTime").textContent;
    let startTimee = document.getElementById("startTimee").textContent;
    let endTimee = document.getElementById("endTimee").textContent;
    const stTime = startTime.substring(0, 5);
    const edTime = endTime.substring(0, 5);
    $("#startTime").text(stTime);
    $("#endTime").text(edTime);
    const stTimee = startTimee.substring(0, 5);
    const edTimee = endTimee.substring(0, 5);
    $("#startTimee").text(stTimee);
	$("#endTimee").text(edTimee);
	
    /*ポップアップを閉じる*/
    $(".close-popup").click(function () {
        $(".confirm-popup").fadeOut();
        $(".error-popup").fadeOut();
    });
    //フォーム送信
    $("#schedule-delete-action").click(function () {
        $("#schedule-delete-form").submit();
        return;
    });
});
