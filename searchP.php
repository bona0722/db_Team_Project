<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="searchPStyle.css">
  <title>2021년 KBO 리그 포스트시즌</title>
  <style>
    table{
      text-align:center;
    }
  </style>
</head>

<body>
<!-- 타이틀 이미지 -->
  <a href="main.html"><img id="title" src="media/title_img.jpg" width="200" height="150"></a>
  <!-- 메뉴바 -->
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

  <!-- 선수 조회 form -->
  <form method="post" action="searchP.php" name="frm">
    <p name = "title">선수조회</p>
    <select name="team_name">
      <option>팀 선택</option>
      <option>KT</option>
      <option>두산</option>
      <option>삼성</option>
      <option>LG</option>
      <option>키움</option>
    </select>
  <input type="text" name="username" >
  <input type="submit" value="검색">
  </form>

<?php
    if(isset($_POST["team_name"])) { // 처음에 null값시 오류 방지
      $team_name = $_POST["team_name"];
      $username = $_POST["username"];
      $con = mysqli_connect("220.67.124.190", "team3", "2021tp", "dbteamproject");

      //팀 검색 sql
      $sql = "SELECT team.team_name, player_name, player_number
              FROM team, player
              WHERE team.team_name = player.team_name and team.team_name='$team_name'
              GROUP BY player.player_number
              ORDER BY player.player_number";    

      //이름 검색 sql
      $sql2 = "SELECT team.team_name, player.player_name, player_number
      FROM team, player
      WHERE team.team_name = player.team_name and player.player_name LIKE '%$username%'
      GROUP BY player.player_number
      ORDER BY player.player_number";   

      $result = mysqli_query($con, $sql) or die(mysqli_error($con));
      $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
      
        //KT 선수 모두 조회
        if($team_name == "KT" && empty($username)){          
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }
        //두산 선수 모두 조회
        elseif($team_name == "두산" && $username ==""){          
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }
        //삼성 선수 모두 조회
        elseif($team_name == "삼성" && $username ==""){          
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }
        //키움 선수 모두 조회
        elseif($team_name == "키움" && $username ==""){          
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }
        //LG 선수 모두 조회
        elseif($team_name == "LG" && $username ==""){          
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }
        //아무것도 적지 않았을 때. 전체 선수가 조회됨.
        elseif($team_name == "팀 선택" && $username == ""){      
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result2)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }
        //이름만 적고 검색
        else{      
          echo "<table>";
          echo "<tr>";
          echo '<th>선수 번호</th>';
          echo '<th>선수 이름</th>';
          echo '<th>소속 팀</th>';
          echo "</tr>";
          
          while($row = mysqli_fetch_array($result2)){
            echo "<tr>";
            echo "<td>".$row['player_number']."</td>";
            echo "<td>".$row['player_name']."</td>";
            echo"<td>".$row['team_name']."</td>";
            echo "</tr>";
            
          }
          echo "</table>";          
        }

      }
  ?>


<script>
</script>
</body>
</html>