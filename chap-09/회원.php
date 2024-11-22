<html>
  <head>
    <title> FROM 태그와 컨트롤 - 회원등록</title>
  </head>

   <body>
    <br><h2><center> 회원등록 화면</center></h2><hr>

    <form method="post" action="" name="formMain" id="formMain">
      <center>
        <table border=0 bordercolor="blue" width=750 cellspacing=1 cellpadding=5>
          <tr>
            <td width=450 align=right> 아이디: </td>
            <td width=330>
              <input type="text" size=10 maxlength=10 name="id" id="id"/>
            </td>

            <td width=200 align=right> 성명: </td>
            <td width=300>
              <input type="text" size=10 maxlength=10 name="name" id="name"/>
            </td>
          </tr>
          
          <tr>
            <td align=right> 비밀번호: </td>
            <td>
              <input type="password" size=10 maxlength=10 name="pw" id="pw"/>
            </td>
            
            <td align=right> 비밀번호 확인: </td>
            <td>
              <input type="password" size=10 maxlength=10 name="pw2" id="pw2"/>
            </td>
          </tr>

          <tr>
            <td align=right> 핸드폰: </td>
            <td>
              <select name="p1" id="p1">
                <option value=" "> 선택</option>
                <option value="010"> 010</option>
                <option value="011"> 011</option>
                <option value="016"> 016</option>
                <option value="017"> 017</option>
                <option value="018"> 018</option>
                <option value="019"> 019</option>
              </select> -
              <input type="text" pattern="[0-9]+" size=4 name="p2" id="p2" maxlength=4> -
              <input type="text" pattern="[0-9]+" size=4 name="p3" id="p3" maxlength=4>
            </td>

            <td align=right> 성별: </td>
            <td>
            <input type="radio" id="Gender0" name="Gender" value="여"/> 여
            <input type="radio" id="Gender1" name="Gender" value="남"/> 남
            </td>
          </tr>

          <tr>
            <td align=right> 주소: </td>
            <td colspan=3>
              <input type="text" size=62 name="addr" id="addr"/>
            </td>
          </tr>

          <tr>
            <td align=right> 남기고 싶은 글: </td>
            <td colspan=3>
              <textarea name="memo" id="memo" rows=8 cols=64></textarea>
            </td>
          </tr>
        </table> <br>

        <table border=0 width=800>
          <tr>
            <td align=center>
              <input type="button" onclick="runSubmit()" value="◀ 회원등록 ▶"/> &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="button" onclick="runReset()" value="◀ 다시 작성 ▶" />
            </td>
          </tr>
        </table>
        <input type="hidden" name="thema" value="회원등록 서식"/>
      </center>
    </form>
   </body>
</html>

<script>
  let selPhone = document.getElementById('phone0')
  let nums = "010;011;017;019"
  let arrNums = nums.split(";") // ;을 구분자로 배열로 만듦
  arrNums.forEach(num => {
    const newOption = document.createElement("option") // 새로운 속성을 추가
    newOption.value = num
    newOption.textContent = num
    selPhone.appendChild(newOption) // selPhone의 자식 개체로 추가
  })

  function runSubmit() {
    let pw = document.getElementById('pw')
    let pwCheck = document.getElementById('pw2')

    /* if (pw != pwCheck) {
      alert("비밀번호가 일치하지 않습니다.")
      return
    } */

    document.getElementById('formMain').submit()
  }
  
  function runReset() {
    document.getElementById('formMain')
  }
</script>

<?php
  if(isset($_POST['id'])) {
    echo "<br> 아이디: ", $_POST["id"];
    echo "<br> 이름: ", $_POST["name"];
    echo "<br> 비밀번호: ", $_POST["pw"];
    echo "<br> 휴대전화: ", $_POST["p1"], " - ", $_POST["p2"], " - ", $_POST["p3"];
    echo "<br> 주소: ", $_POST["addr"];
    echo "<br> 메모: ", $_POST["memo"];
  }
?>