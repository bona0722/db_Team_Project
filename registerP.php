<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="registerPStyle.css">
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
        </ul>
      </li>
      <li><a href="stadium.php">경기장</a>
        <ul id="sub_menu">
          <li><a href="stadium.php" aria-label="subemnu">경기장조회</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <form method="post" action="registerP.php" name="frm">
    <p name="title">선수등록현황</p>
    <select name="team_name">
      <option>팀 선택</option>
      <option>KT</option>
      <option>두산</option>
      <option>삼성</option>
      <option>LG</option>
      <option>키움</option>
    </select>
    <!--팀 선택이라는 이름을 가진 창이 생성되고 그 창에서 팀을 선택할수 있는 코드 -->
    <select name="date">
      <option>11-1</option>
      <option>11-2</option>
      <option>11-4</option>
      <option>11-7</option>
      <option>11-9</option>
      <option>11-10</option>
      <option>11-14</option>
      <option>11-15</option>
      <option>11-17</option>
      <option>11-18</option>
    </select>
    <!-- 날짜들을 선택할 수 있는 코드  -->
    <input type="submit" value="검색">

  </form>

  <?php
    if(isset($_POST["team_name"])) {
      $team_name = $_POST["team_name"];
      $date = $_POST["date"];
      $con = mysqli_connect("220.67.124.190", "team3", "2021tp", "dbteamproject");
      $sql = "SELECT team.team_name, play.player_name, play.player_number, player_position
      FROM team, play, game
      WHERE team.team_name=play.team_name and game.date = play.date and team.team_name='$team_name' and game.date='$date'";

      // TEAM,PLAY,GAME을 조인을 하여 사용자가 원하는 팀이름과 날짜에 맞는 값을 얻을 수 있는 질의 생성이다. 

      $result = mysqli_query($con, $sql) or die(mysqli_error($con));

      if($team_name == "KT" && isset($date)){
        
            echo "<table>";
            echo "<tr>";
            echo '<th>선수 번호</th>';
             echo '<th>선수 이름</th>';
             echo '<th>소속 팀</th>';
             echo '<th>선수 포지션</th>';
             echo "</tr>";
          
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo"<td>".$row['player_position']."</td>";
            echo "</tr>";
            
          }

          echo "</table>";
      }
      //이것은 KT가 어떤 날(일정)에 어떤 선수들이 출전헀는지 알수 있는 코드이다. 
      elseif($team_name == "두산" && isset($date)){
          
        echo "<table>";
        echo "<tr>";
        echo '<th>선수 번호</th>';
         echo '<th>선수 이름</th>';
         echo '<th>소속 팀</th>';
         echo '<th>선수 포지션</th>';
         echo "</tr>";
      
      while($row = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['player_number']."</td>";
        echo "<td>".$row['player_name']."</td>";
        echo"<td>".$row['team_name']."</td>";
        echo"<td>".$row['player_position']."</td>";
        echo "</tr>";
        
      }
      echo "</table>";
     }
      //이것은 두산이 어떤 날(일정)에 어떤 선수들이 출전헀는지 알수 있는 코드이다. 
     elseif($team_name == "삼성" && isset($date)){
          
      echo "<table>";
      echo "<tr>";
      echo '<th>선수 번호</th>';
       echo '<th>선수 이름</th>';
       echo '<th>소속 팀</th>';
       echo '<th>선수 포지션</th>';
       echo "</tr>";
    
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$row['player_number']."</td>";
      echo "<td>".$row['player_name']."</td>";
      echo"<td>".$row['team_name']."</td>";
      echo"<td>".$row['player_position']."</td>";
      echo "</tr>";
      
    }
    echo "</table>";
  }
   //이것은 삼성이 어떤 날(일정)에 어떤 선수들이 출전헀는지 알수 있는 코드이다
    elseif($team_name == "LG" && isset($date)){
            
      echo "<table>";
      echo "<tr>";
      echo '<th>선수 번호</th>';
      echo '<th>선수 이름</th>';
      echo '<th>소속 팀</th>';
      echo '<th>선수 포지션</th>';
      echo "</tr>";
    
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$row['player_number']."</td>";
      echo "<td>".$row['player_name']."</td>";
      echo"<td>".$row['team_name']."</td>";
      echo"<td>".$row['player_position']."</td>";
      echo "</tr>";
      
    }
    echo "</table>";
  }
   //이것은 LG가 어떤 날(일정)에 어떤 선수들이 출전헀는지 알수 있는 코드이다
    elseif($team_name == "키움" && isset($date)){
              
      echo "<table>";
      echo "<tr>";
      echo '<th>선수 번호</th>';
      echo '<th>선수 이름</th>';
      echo '<th>소속 팀</th>';
      echo '<th>선수 포지션</th>';
      echo "</tr>";

    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
      echo "<td>".$row['player_number']."</td>";
      echo "<td>".$row['player_name']."</td>";
      echo"<td>".$row['team_name']."</td>";
      echo"<td>".$row['player_position']."</td>";
      echo "</tr>";
      
    }
    echo "</table>";
    }
     //이것은 키움이 어떤 날(일정)에 어떤 선수들이 출전헀는지 알수 있는 코드이다
    else {
      echo "팀을 선택해주세요.";
    }
    //위 조건을 충족시키지 못할때 출력되는 값

  }

?>

</body>

</html>