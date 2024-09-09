<?php
  echo "<br> 같은 변수명의 데이터 타입 변환 <br>";
  echo "==================================<br>";
  $var = 123;
  echo "1. \$var = 123 변수의 데이터 타입 : ";
  echo gettype($var);
  $var = 38.52;
  echo "<br> 2. \$var = 38.52 변수의 데이터 타입 : ";
  echo gettype($var);
?>