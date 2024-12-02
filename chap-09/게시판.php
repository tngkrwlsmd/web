<?php
  // echo "작성자: ", $_GET['inID'], "<br>";
  // echo "이름: ", $_GET['inName'], "<br>";
  // setcookie('a','b', time() + 60);
  // echo "<br> ab: ", $_COOKIE['ab'], "<br>";

  session_start();
  echo "ID: ", $_COOKIE['ckID'], "<br>";
  echo "이름: ", $_SESSION['ssName'], "<br>";
?>