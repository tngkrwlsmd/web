<html>
  <head>
    <title> FROM 태그와 컨트롤 - 회원등록</title>
  </head>

  <?php
    $conn = mysqli_connect("localhost", "root", "1234");

    if($conn) {
      $db = mysqli_select_db($conn, "sample01_db");

      if ($db) {
        // extract($_POST);
        if(isset($_POST['id'])) {
          $id = $_POST["id"];
          $name = $_POST["name"];
          $pw = $_POST["pw"];
          $mobile = $_POST["p1"]. " ". $_POST["p2"]. " ". $_POST["p3"];
          $gender = isset($_POST["Gender"]) && $_POST["Gender"] === "0" ? 0 : 1;
          $addr = $_POST["addr"];
          $text = $_POST["memo"];

          $query = "INSERT member VALUES (
          '$id', '$name', '$pw', '$mobile', '$gender' ,'$addr', '$text')";
          $result = mysqli_query($conn, $query);
        }

        $query = "SELECT * FROM member";
          $result = mysqli_query($conn, $query);
          $cols = mysqli_num_fields($result);
          echo "<table id='tableMain' border=1>";
          echo "<tr><td>ID</td><td>이름</td><td>비밀번호</td><td>핸드폰</td><td>성별</td><td>주소</td><td>메모</td></tr>";
          while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            for ($i = 0; $i < $cols; $i++) {
              echo "<td> ", $row[$i], "</td>";
            }
            echo "</tr>";
          }
          echo "</table>";
          mysqli_free_result($result);
      }
    }

    if(is_resource($conn)) {
      mysqli_close($conn);
    }
  ?>

  <script>
    let table = document.getElementById('tableMain')
    for (let i = 0; i < table.rows.length; i++) {
      for (let j = 2; j < 7; j++) {
        table.rows[i].cells[j].style.display = 'none'
      }

      table.addEventListener('click', (event) => {
        let clickRow = event.target.closest('tr')
        let rowList = Array.from(table.rows)
        let index = rowList.indexOf(clickRow)
        runSelect(index)
      })
    }

    function runSelect(index) {
      let table = document.getElementById('tableMain')
      let rowList = table.rows

      document.getElementById('id').value = rowList[index].cells[0].innerText
      document.getElementById('name').value = rowList[index].cells[1].innerText
      document.getElementById('pw').value = rowList[index].cells[2].innerText
      let arrMob = rowList[index].cells[3].innerText.split(' ')
      document.getElementById('p1').value = arrMob[1];
      document.getElementById('p2').value = arrMob[2];
      document.getElementById('p3').value = arrMob[3];

      //document.getElementById('Gender').value = rowList[index].cells[4].innerText
      document.getElementById('addr').value = rowList[index].cells[5].innerText
      document.getElementById('memo').value = rowList[index].cells[6].innerText

      let radioGender = rowList[index].cells[4].innerText
      if (radioGender == 0) radioGender = "0"
      else radioGender = "1"
      let radioButton = document.querySelector(`input[name="Gender"][value="${radioGender}"]`)
      if (radioButton) {
        radioButton.checked = true
      }
    }

    /* let selPhone = document.getElementById('phone1') // p1 이지만, option 말고도 다른 방법이 존재함을 알려줌
    let nums = "010;011;017;019"
    let arrNums = nums.split(";") // ;을 구분자로 배열로 만듦
    arrNums.forEach(num => {
      const newOption = document.createElement("option") // 새로운 속성을 추가
      newOption.value = num
      newOption.textContent = num
      selPhone.appendChild(newOption) // selPhone의 자식 개체로 추가
    }) */

    function runSubmit() {
      let pw = document.getElementById('pw').value
      let pwCheck = document.getElementById('pw2').value

      if (pw != pwCheck) {
        alert("비밀번호가 일치하지 않습니다.")
        return
      }

      document.getElementById('formMain').submit()
    }
    
    function runReset() {
      document.getElementById('formMain')
    }
  </script>
  
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
            <input type="radio" id="Gender0" name="Gender" value="0"/> 여
            <input type="radio" id="Gender1" name="Gender" value="1"/> 남
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
              <!-- div 태그를 이용한 방법 -->
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