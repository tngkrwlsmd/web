<?php
  echo "<br 3과목 총점과 평균 구하기 <br>";
  echo "============================ <br>";
  $os = 87;
  $grp = 96;
  $sec = 73;

  $sum = $os + $grp + $sec;
  $avg = $sum/3;
?>

  운영체제 : <?=$os?> <br>
  웹그래픽 : <?=$grp?> <br>
  정보보안 : <?=$sec?> <br>
  ============================ <br>
  과목총점 : <?=$sum?> 점 <br>
  평균점수 : <?=$avg?> 점 <br>
  ============================ <br>
  $avg의 데이터 타입 : <?=gettype($avg);?>