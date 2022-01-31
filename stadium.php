<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stadiumStyle.css">
  <title>2021년 KBO 리그 포스트시즌</title>
</head>

<body>

  <a href="main.html"><img id="title" src="media/title_img.jpg" width="200" height="150"></a>
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
          <li><a href="registerAllP.php" aria-label="subemnu">전체등록현황</a></li>
        </ul>
      </li>
      <li><a href="stadium.php">경기장</a>
        <ul id="sub_menu">
          <li><a href="stadium.php" aria-label="subemnu">경기장조회</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <form method="post" action="stadium.php" name="frm">  <!--php post방식 사용을 위한 form tag-->
    <p name="title">일정별 경기장장소</p> <!--title인 일정별 경기장소 문단 구성 -->
    <select id="play_date" name="play_date" onchange="changeStadium()"> <!--일정선택-->
      <option value="11-1">11월 1일</option>
      <option value="11-2">11월 2일</option>
      <option value="11-4">11월 4일</option>
      <option value="11-5">11월 5일</option>
      <option value="11-7">11월 7일</option>
      <option value="11-9">11월 9일</option>
      <option value="11-10">11월 10일</option>
      <option value="11-14">11월 14일</option>
      <option value="11-15">11월 15일</option>
      <option value="11-17">11월 17일</option>
      <option value="11-18">11월 18일</option>
    </select>
    <input type="submit" value="확인"> <!--submit 목적으로하는 버튼 -->
  </form>

  <?php 
  // 경기날짜
  if(isset($_POST["play_date"])){ //날짜와 play_date 일치 시, 설정이 되어있다면 true

    $place = $_POST['play_date']; 
    $con = mysqli_connect("220.67.124.190", "team3", "2021tp", "dbteamproject"); //dbteamproject명으로 만든 mysql에 접근하는 내용 'con' 변수로 저장
    $sql = "select date from game where date='$place'"; //place를 받아오기 위한 sql 질의문
    $result = mysqli_query($con, $sql);  //con에서 select stadium from game where date='$play_date' 질의 후 저장
    $num_match = mysqli_num_rows($result);

    //경기장 위치
    $place_sql = "select stadium from game where date='$place'"; //place를 받아오기 위한 sql 질의문
    $place_result = mysqli_query($con, $place_sql); //con에서 select stadium from game where date='$play_date' 질의 후 저장

    if ($place == "11-1"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>"; 
      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-2"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-4"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-5"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>"; 
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>"; 
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-7"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-9"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-10"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-14"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { //일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-15"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { // 일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { // 경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-17"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { // 일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
    elseif ($place == "11-18"){ //날짜 일치 시, 일정과 경기장 테이블 생성 
      echo "<table>";
      echo "<tr>";
      echo '<th>일정</th>';
      echo '<th>경기장</th>';
      echo "</tr>";

      while($row = mysqli_fetch_assoc($result)) { // 일정 데이타 출력
        echo "<tr>";
        echo "<td>".$row['date']."</td>";
      }
      while($row = mysqli_fetch_assoc($place_result)) { //경기장 데이타 출력
        echo "<td>".$row['stadium']."</td>";
        echo "</tr>";
      }
      echo "</table>";
    }
  }

?>
<script>
    function changeStadium() { //input type date에서 value값 변화시 발생하는 script함수
      var date = document.getElementById("play_date").value; //date 변수에 value값 저장
      console.log(date); //date변환 확인을 위한 콘솔 출력
    };
  </script>
</body>

</html>