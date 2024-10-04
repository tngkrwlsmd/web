<?php
/*
  // 오버로딩, 오버라이딩 불가
  function meating($name="", $age=0) { //파라메터의 기본값은 뒤 -> 앞
    echo $age, "세인 ", "<b>[",$name,"]</b>님의 소개를 부탁합니다...<br>";
  }

  meating("홍길동", 18);
  meating("성춘향");
  */
  function hap($a, $b) {
    $sum = $a + $b;
    return $sum;
  }

  function div($a, $b) {
    if ($b == 0) {
      return;
    } else {
      $r = $a / $b;
      return $r;
    }
  }

  $result = hap(5, 10);
  echo "5 + 10 = ", $result, "<br>";

  $result = div(10, 0);
  echo "10 / 0 = ", $result, "<br>";


?>