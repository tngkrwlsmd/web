<?php
  echo "<br><B> \$a = 8 일 때 감소 연산자의 연속 사용<\B><br>";
  echo "============================================= <br>";

  $a = 8;

  $a--;
  echo "\$a--를 선언할 경우 \$a = $a <br>";
  --$a;
  echo "--\$a를 선언할 경우 \$a = $a <br><br>";

  $b = $a--;
  echo "\$b = \$a-- 일 때, \$a = $a, \$b = $b <br>";

  $b = --$a;
  echo "\$b == --\$a 일 때, \$a = $a, \$b = $b <br>";
?>