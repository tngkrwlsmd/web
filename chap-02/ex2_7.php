<?php
  echo "<br 3과목 총점과 평균 구하기 <br>";
  echo "============================ <br>";
  $os = 87;
  $grp = 96;
  $sec = 73;

  $sum = $os + $grp + $sec;
  $avg = $sum/3;

  echo "> 운영체제 : $os 점 <br>";
  echo "> 웹그래픽 : $grp 점 <br>";
  echo "> 정보보안 : $sec 점 <br>";
  echo "============================ <br>";
  echo "> 과목총점 : $sum 점 <br>";
  echo "> 평균점수 : $avg 점 <br>";
  echo "============================ <br>";
  echo "> \$avg의 데이터 타입 : ";
  echo gettype($avg);
?>