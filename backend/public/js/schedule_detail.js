$(function () {
    let startTime = document.getElementById("startTime").textContent;
    let endTime = document.getElementById("endTime").textContent;
    let startTimePopup = document.getElementById("startTimePopup").textContent;
    let endTimePopup = document.getElementById("endTimePopup").textContent;
    const startTimeEllipsis = startTime.substring(0, 5);
    const endTimeEllipsis = endTime.substring(0, 5);
    $("#startTime").text(startTimeEllipsis);
    $("#endTime").text(endTimeEllipsis);
    const startTimePopupEllipsis = startTimePopup.substring(0, 5);
    const endTimePopupEllipsis = endTimePopup.substring(0, 5);
    $("#startTimePopup").text(startTimePopupEllipsis);
	$("#endTimePopup").text(endTimePopupEllipsis);
	
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
