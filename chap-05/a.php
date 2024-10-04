<?php
  $name[0]="영희";
  $name[1]="철희";
  $name[2]="명희";

  $kor[0]=89;
  $kor[1]=90;
  $kor[2]=85;

  for ($i=0; $i<3; $i++) {
    echo $name [$i] , "의 성적은 " , $kor [$i] , "입니다<br>";
  }
?>
<hr>

<?php
  $kor["영희"]=89;
  $kor["철희"]=90;
  $kor["명희"]=95;

  foreach ($kor as $key => $value) {
    echo $key, "의 성적은 ", $value, "입니다<br>";
  }
?>