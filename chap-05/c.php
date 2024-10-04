<?php
  if(isset($_POST["pw"])) {
    $inPassword = $_POST["pw"];
  } else {
    $inPassword = "";
  }

  echo $inPassword, "<br>";
  $cryptInPassword = crypt($inPassword, 'ab');
  echo $cryptInPassword, "<br>";

  //db에서 가져옴
  $savePassword = "abcde";
  $cryptPassword = crypt($savePassword, 'ab');
  echo $cryptPassword, "<br>";
  echo "<hr>";
  if ($cryptInPassword == $cryptPassword) {
    echo "환영합니다";
  } else {
    echo "비번이 일치하지 않습니다";
  }
  echo "<hr>";
?>

<form action="" method="POST" id="frm">
  <input type="text" id ="pw" name="pw">
  <input type="button" onclick="run()" value="확인">
</form>

<script>
  function run() {
    let curpw = document.getElementById("pw").value;
    if (curpw.length < 5) {
      alert('암호는 5글자 이상입니다.')
      return
    }
    document.getElementById("frm").submit();

  }
</script>