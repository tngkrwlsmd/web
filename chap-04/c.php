<?php
  if (isset($_POST['score'])) {
    $score = $_POST["score"];
    $result;

    switch ($score / 10) {
      case 10: 
      case 9: $result = "A"; break;
      case 8: $result = "B"; break;
      case 7: $result = "C"; break;
      case 6: $result = "D"; break;
      default: $result = "F"; break;
    }

    echo $score, " => ", $result;
  }
?>

<hr>

<html>
  <body>
    <form action="" method="POST" id="grade">
      점수: <input type="text" name="score" id="score"> <br>
      <input type="button" value="결과" onclick="cal()">
    </form>
  
  <script>
    function cal() {
      document.getElementById("grade").submit();
    }
  </script>
  </body>
</html>