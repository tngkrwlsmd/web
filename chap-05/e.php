<?php
  $a = "오늘은 어제 죽어간 이가 그토록 기다리던 내일이다.";
  $b = "Have a good time.";
  echo "a: ", $a, "<br>";
  echo "b: ", $b, "<br>";
  echo "<hr>";

  $str[0] = substr($a, 3);
  $str[1] = substr($a, 6, 10);
  $str[2] = substr($a, -10);
  $str[3] = substr($a, -17, 10);
  $str[4] = substr($b, 4);
  $str[5] = substr($b, 5, 6);
  $str[6] = substr($b, -10, 4);
  $str[7] = strchr($a, "이가");
  $str[8] = strchr($b, "g");

  for ($a = 0; $a <= 8; $a++) {
    echo $a, ": ", $str[$a], "<br>";
  }
?>