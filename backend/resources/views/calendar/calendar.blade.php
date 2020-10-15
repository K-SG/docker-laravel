<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
{{--  <%@ include file="/WEB-INF/views/layout/common/link.jsp" %>  --}}
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<title>予定確認</title>
</head>
<body>
    @section('header')
    @parent
    {{--  インデックスページ  --}}
@endsection
<article>
  <input type="hidden" id="list" value='${json}' style="display:none">
  <div class="calendar-container">
    <div class="calendar-container-inner">
      <div class="calendar-title">
        <form action="../user/calendar" method="post" id="left-form">
          <input type="hidden" name="flag" value="0">
          <input type="hidden" name="date" value="${date}">
          <div class="title-content">
            <img src="{{ asset('img/left_button.png') }}" alt="left"  id="left" class="left triangle-button">
          </div>
        </form>
        <div class="title-content">
          <h2 id="month"><c:out value="${month}"/></h2>
        </div>
        <div class="title-content">
          <h3 id="year"><c:out value="${year}"/></h3>
        </div>
        <form action="../user/calendar" method="post" id="right-form">
          <input type="hidden" name="flag" value="1">
          <input type="hidden" name="date" value="${date}">
          <div class="title-content">
            <img src="{{ asset('img/right_button.png') }}" alt="right" id="right" class="right triangle-button">
          </div>
        </form>
        <div class="clear"></div>
      </div>
      <table class="calendar">
        <thead>
          <tr class="youbi">
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <div class="kronon-speak-container">
		<div class="kronon-speak">
		  <div class="arrow-container">
			<div class="arrow_box" id="kronon-message"></div>
		  </div>
		  <img src="{{ asset('img/kronon/kronon_prin.png') }}" class="kronon-img">
		</div>
	  </div>
	</div>
  </div>
  <input type="hidden" id="date_servlet"  value='${date}' style="display:none">
</article>
<%@ include file="/WEB-INF/views/layout/common/footer.jsp" %>
<script src="../js/common/common.js"></script>
<script src="{{ asset('js/calendar.js') }}"></script>
<script src="{{ asset('js/calendar_event.js') }}"></script>
</body>
</html>