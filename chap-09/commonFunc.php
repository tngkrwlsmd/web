<?php
  $aa = 'aaaaaa';
  session_start();
  function sum ($n1, $n2) {
    return $n1 + $n2;
  }

  function welcome($inName) {
    echo "<br>". $inName. "님 환영합니다.";
  }
  
?>