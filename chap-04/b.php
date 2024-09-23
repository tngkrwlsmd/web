<?php
  if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['result'])) {
    $fee = $_POST["num1"];
    $age = $_POST["num2"];
    $result = $_POST['result'];

    echo "요금: $result";
  }
?>

<html>
  <body>
    <form acthon="" method="POST" id="fee">
    요금: <input type="text" name= "num1" id="num1"> <br>
    나이: <input type="text" name= "num2" id="num2"> <br>
    <input type='hidden' name='result' id='result'>
    <input type="button" value="계산" onclick="discount()">
    </form>

    <script>
      function discount() {
        let fee = parseInt(document.getElementById("num1").value)
        let age = parseInt(document.getElementById("num2").value)
        let result = fee;
        if (age <= 10 || age >= 65) result *= 0.5
        document.getElementById("result").value = result;
        document.getElementById("fee").submit()
      }
    </script>
  </body>
</html>