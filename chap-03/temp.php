<?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $num1 = $_POST['num1'];
          $num2 = $_POST['num2'];
          $operation = $_POST['oper'];
          $result = '';

          switch ($operation) {
              case '+':
                  $result = $num1 + $num2; break;
              case '-':
                  $result = $num1 - $num2; break;
              case '*':
                  $result = $num1 * $num2; break;
              case '/':
                  if ($num2 != 0) $result = $num1 / $num2;
                  else $result = "0으로 나눌 수 없습니다";
                  break;
          }
          echo "결과: $result";
      }
?>