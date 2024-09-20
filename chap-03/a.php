<?php
  if (isset($_POST['num1']) && isset($_POST['num2'])) {
    $iNum1 = $_POST['num1'];
    $iNum2 = $_POST['num2'];
    $opr = $_POST['opr'];
    $resul = '';

    if ($opr == '+') $result = $iNum1 + $iNum2;
    else if ($opr == '-') $result = $iNum1 - $iNum2;
    else if ($opr == '*') $result = $iNum1 * $iNum2;
    else if ($opr == '/') $result = $iNum1 / $iNum2;
    echo "$iNum1 $opr $iNum2 = $result";
  }
?>

<html>
  <body>
    <form action="a.php" method="POST" id='frmMain'>
      <input type="text" name="num1"> <br>
      <input type="text" name="num2"> <br>

      <input type='hidden' name ='opr' id='opr'>
      <input type="button" onclick="runSubmit('+')" value="더하기"></button>
      <input type="button" onclick="runSubmit('-')" value="빼기"></button>
      <input type="button" onclick="runSubmit('*')" value="곱하기"></button>
      <input type="button" onclick="runSubmit('/')" value="나누기"></button>
    </form>
    <script>
      function runSubmit(inMode) {
        let frmOpr =document.getElementById('opr')
        frmOpr.value = inMode
        let frm = document.getElementById('frmMain')
        frm.submit();
      }
    </script>

  </body>
</html>