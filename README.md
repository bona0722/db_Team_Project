# <p align="center"> 데이터베이스 2021학년 2학기 Team Project </p>
</br>
</br>

## <p align="center"> 2021년 가을 야구 웹페이지</p>
</br>


## 1.프로그램의 목적 및 개요
![1](https://github.com/bona0722/db_Team_Project/assets/58328096/beead899-8e54-4d9a-91df-dda80f47ace0)



### 본 프로그램은 2021년 가을야구에 사용된 데이터를 사용하여 데이터베이스를 기반으로 한 웹페이지를 만들고 이를 활용하는 것을 목적으로 한다.

#### 소개 영상

</br>
</br>

#### 1-1 역할 분배
<br/>

|참여자|직책|역할|
|:---:|:---:|:---:|
|소호정|팀장|Server 및 DB 구축 </br> 데이터 수집 및 정리 </br> 웹페이지 전체 총괄 및 설계|
|김자경|팀원|데이터 수집 및 정리 </br> 웹페이지 설계|
|심준보|팀원|데이터 수집 및 정리 </br> 웹페이지 설계|
|류진|팀원|데이터 수집 및 정리 </br> 웹페이지 설계 <br/> E-R 모델 설계|

</br>
</br>

## 2. 본 프로그램의 구조 및 설명
</br>
</br>

**2-1. 테이블 구성**
> Game [date, winner, loser, winner_score, loser_score,stadium]</br>
> Participate [team_name, date]</br>
> Play [date, team_name, player_number, player_name, player_position]</br>
> Player [player_number, player_name, team_name]</br>
> Team [team_name, number_of_player]</br>

</br>
</br>


**2-2. DataBase**
> MariaDB 

</br>
</br>

**2-3. 사용 언어**
> html, css, javascript, sql, php </br>

</br>
</br>

#### 2-4. E-R model
![E-R모델](https://github.com/bona0722/db_Team_Project/assets/58328096/5b7b51e8-8bd8-44fb-8b80-e8db5ac976dd) <br/>


#### 2-5. Entity 관계도
![엔티티 관계도](https://github.com/bona0722/db_Team_Project/assets/58328096/8d21dc06-45ba-4d7e-ba7b-de40cf19f164)<br/>


