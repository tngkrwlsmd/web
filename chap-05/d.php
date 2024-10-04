<?php
  $inMemo = $_POST["memo"];
  echo $inMemo;
  echo "<hr>";
  $inMemo = nl2br($inMemo);
  echo $inMemo;
 ?>

<form action="" method="POST" id="frm"> 
  <textarea id="memo" name="memo"></textarea>
  <input type="button" onclick="runSubmit()" value="확인">
</form>
<script>
  function runSubmit() {
    document.getElementById('frm').submit()
  }
</script>