<style>
  .form { display: inline-block; width: 100px; text-align: left; }
  .warning { color: red;}
</style>

<form action="" method="post" id="frm">
  <label class="form">ID: </label> <input type="text" id="id" name="id"><br>
  <label class="form">PW: </label> <input type="text" id="pw" name="pw"> 
    <label style="margin: 100px" class="warning"> 8자 이상, 영문대소문자와 _만 가능</label><br>
  <label class="form">이름: </label> <input type="text" id="name" name="name"><br>
  <label class="form">나이: </label> <input type="text" id="age" name="age"> 
    <label style="margin: 100px;" class="warning"> 숫자만 입력</label><br>
  <label class="form">주민등록번호: </label> <input type="text" id="ssn" name="ssn">xxxxxx 
    <label style="margin: 55px;" class="warning"> * 앞 6자리와 -, 뒤 1자리만 기입000000-0xxxxxx</label><br>
  <label class="form">회원구분: </label> 
    <input type="radio" id="general" name="membership" value="일반회원" checked>
    <label for="general">일반회원</label>
    <input type="radio" id="special" name="membership" value="특별회원">
    <label for="special">특별회원</label><br>
  <label class="form">등록목적: </label>
    <input type="checkbox" id="hobby" name="purpose[]" value="취미">
    <label for="hobby">취미</label>
    <input type="checkbox" id="business" name="purpose[]" value="창업">
    <label for="business">창업</label>
    <input type="checkbox" id="club" name="purpose[]" value="동호회">
    <label for="club">동호회</label>
    <input type="checkbox" id="etc" name="purpose[]" value="기타">
    <label for="etc">기타</label><br>
  <label>자기소개 </label> <label class="warning">(10자 이상)</label>:<br>
    <textarea id="intro" name="intro" rows="4" cols="50" required></textarea><br>
  <input type="button" onclick="run()" value="확인">
</form>

<script>
  function run() {
    document.getElementById("frm").submit();
  }
</script>

<?php

  $id; $pw; $name; $age; $ssn; $intro; $sex; $birth; $membership; $purpose;

  if ((isset($_POST["id"]))) {
    $id = $_POST["id"];
    echo "ID: ", $id, "<br>";
    echo "=================== <br>";
  }
  if (isset($_POST["pw"])) {
    if (preg_match("/^[A-Za-z_]{8,}$/", $_POST["pw"])) {
      $pw = $_POST["pw"];
    }
  }
  if ((isset($_POST["name"]))) {
    $name = $_POST["name"];
    echo "이름: ", $name, "<br>";
    echo "=================== <br>";
  }

  if (isset($_POST["age"])) {
    $age = $_POST["age"];
    if (preg_match("/^[0-9]+$/", $age)) {
      echo "나이: ", $age, "<br>";
      echo "=================== <br>";
    }
  }
  if (isset($_POST["ssn"])) {
    $ssn = $_POST["ssn"];
    if (preg_match("/^[0-9]{6}-[0-9]{1}$/", $ssn)) {
      $birth = substr($ssn, 0, 6);
      $sex = substr($ssn, 7);
      if ($sex % 2 != 0) $sex = "남자";
      else $sex = "여자";
      echo "주민번호: ", $ssn, "xxxxxx", "<br>";
      echo "=================== <br>";
      echo "생년월일: ", $birth, "<br>";
      echo "=================== <br>";
      echo "성별: ", $sex, "<br>";
      echo "=================== <br>";
    }
  }
  if (isset($_POST["membership"])) {
    $membership = $_POST["membership"];
    echo "회원구분: ", $membership, "<br>";
    echo "=================== <br>";
  }
  if (isset($_POST["purpose"])) {
    $purpose = isset($_POST['purpose']) ? implode(", ", $_POST['purpose']) : "없음"; #문자열 -> 배열: explode(), 배열 -> 문자열: implode(); 
    echo "등록목적: ", $purpose, "<br>";
    echo "=================== <br>";
  }
  if (isset($_POST["intro"])) {
    $intro = $_POST["intro"];
    $intro = nl2br($intro);
    echo "자기소개 -> ", "<br>", $intro, "<br>";
    echo "=================== <br>";
  }
?>