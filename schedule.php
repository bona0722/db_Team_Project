<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="scheduleStyle.css">
  <title>2021년 KBO 리그 포스트시즌</title>

  <script>
    var flag = 0; //flag 사용
    function changeDate() { //input type date에서 value값 변화시 발생하는 script함수
      var date = document.getElementById("play_date").value; //date 변수에 value값 저장
      flag = 1; //flag 변환
      console.log(date); //date변환 확인을 위한 콘솔 출력
    };
    // function loadBody() { //페이지 load error warnig
    //   if (flag == 0) {
    //     console.log(flag)
    //     alert("페이지 로드 Warning.");
    //   };
    // };
  </script>
</head>

<body onload="loadBody()"> <!-- loadBody()는 혹시 모를 오류 대비로 작성하였다가 그대로 사용하게 되었습니다. -->
  <a href="main.html"><img id="title" src="media/title_img.jpg" width="200" height="150"></a> <!--main page img-->
  <nav role="navigation">
    <ul id="main_menu">
      <li><a href="schedule.php">일정/결과</a>
        <ul id="sub_menu">
          <li><a href="schedule.php" aria-label="subemnu">일정조회</a></li>
        </ul>
      <li><a href="teamRank.html">기록</a>
        <ul id="sub_menu">
          <li><a href="teamRank.html" aria-label="subemnu">팀순위</a></li>
        </ul>
      </li>
      <li><a href="searchP.php" name="player">선수</a>
        <ul id="sub_menu">
          <li><a href="searchP.php" aria-label="subemnu">선수조회</a></li>
          <li><a href="registerP.php" aria-label="subemnu">선수등록현황</a></li>
        </ul>
      </li>
      <li><a href="stadium.php">경기장</a>
        <ul id="sub_menu">
          <li><a href="stadium.php" aria-label="subemnu">경기장조회</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <form name="schedule_page" method="post" action="schedule.php"> <!--php post방식 사용을 위한 form tag-->
    <h3>일정조회</h3>
    <input id="play_date" name="play_date" type="date" value="2021-11-01" onchange="changeDate()"> <!--일정입력-->
    <input type="submit" value="전송"> <!--submit 목적으로하는 버튼 -->
  </form>

  <?php
  //경기날짜
  if(isset($_POST["play_date"])){

    $play_date_old = $_POST["play_date"]; //html에서 받은 YYYY-MM-DD 날짜형식
    $play_date = date("n-j",strtotime($play_date_old)); //mariaDB를 이용한 DB에 date를 MM-D로 저장해서 입력받은 날짜 데이터 형변환 시켜 줌.
    $con = mysqli_connect("220.67.124.190", "team3", "2021tp", "dbteamproject"); //dbteamproject명으로 만든 mysql에 접근하는 내용 'con' 변수로 저장
  
    //경기장 위치
    $place_sql = "select stadium from game where date='$play_date'"; //place를 받아오기 위한 sql 질의문
    $place_result = mysqli_query($con, $place_sql); //con에서 select stadium from game where date='$play_date' 질의 후 저장
    // echo $place_sql.'<br>';
  
    //우승팀
    $winner_sql = "select winner from game where date='$play_date'"; //winner를 받아오기 위한 sql 질의문
    $winner_result = mysqli_query($con, $winner_sql); //con에서 select winner from game where date='$play_date' 질의 후 저장
    //패배팀
    $loser_sql = "select loser from game where date='$play_date'"; //loser를 받아오기 위한 sql 질의문
    $loser_result = mysqli_query($con, $loser_sql); //con에서 select loser from game where date='$play_date' 질의 후 저자
  
    //우승팀점수
    $winpoint_sql = "select winner_score from game where date = '$play_date'"; //winner_point를 받아오기 위한 spl 질의문
    $winpoint_result = mysqli_query($con, $winpoint_sql); //con에서 select winner_score from game where date = '$play_date' 질의 후 저장
    //패배팀점수
    $losepoint_sql = "select loser_score from game where date ='$play_date'"; //loser_point를 받아오기 위한 sql 질의문
    $losepoint_result = mysqli_query($con, $losepoint_sql); //con에서 select loser_score from game where date ='$play_date' 질의 후 저장
  
  
  
  
    echo '<div style:"width=50%">'; //출력되는 범위 지정
    if ($play_date_old) {
      echo '날짜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;'.$play_date_old.'<br>'; //날짜 정보 출력
    };
    if (mysqli_num_rows($place_result) > 0) {
      while($rowData = mysqli_fetch_array($place_result)){
          echo '경기장&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;'.$rowData["stadium"].'<br>'; //경기장 정보 출력
      }
    }
    if (mysqli_num_rows($winner_result) > 0) {
      while($rowData = mysqli_fetch_array($winner_result)){
          echo '승리팀&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;'.$rowData["winner"].'<br>'; //승리팀 정보 출력
      }
    }
    if (mysqli_num_rows($loser_result) > 0) {
      while($rowData = mysqli_fetch_array($loser_result)){
          echo '패배팀&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;'.$rowData["loser"].'<br>'; //패배팀 정보 출력
      }
    }
    if (mysqli_num_rows($winpoint_result) > 0) {
      while($rowData = mysqli_fetch_array($winpoint_result)){
          echo '승리 점수 : &nbsp;'.$rowData["winner_score"].'점<br>'; //승리점수 정보 출력
      }
    }
    if (mysqli_num_rows($losepoint_result) > 0) {
      while($rowData = mysqli_fetch_array($losepoint_result)){
          echo '패배 점수 : &nbsp;'.$rowData["loser_score"].'점<br>'; //패배점수 정보 출력
      }
    }
    echo '</div>';

  }

  ?>

</body>

</html>