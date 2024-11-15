<html>
  <style>
    table, td, th {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th {
      background-color: gray;
    }
    .button {
      border: solid 1px blue;
      border-radius: 5px;
      background-color: #ccc;
      cursor:pointer;
    }
  </style>

  <?php
    $conn = mysqli_connect("localhost", "root", "1234"); // DB 서버 연결

    if($conn) {
      $db = mysqli_select_db($conn, "sample01_db"); // 서버 내에서 DB 선택

      if ($db) {
        $query = "SELECT * FROM guest"; // guest 테이블의 모든 내용을 가져옴
        $result = mysqli_query($conn, $query); // 쿼리를 실행하여 $result 변수에 저장

        echo "<table id='tableID'>";

        echo "<tr>";
        $fields = mysqli_fetch_fields($result); // $result 변수에서 필드 목록을 가져옴
        foreach ($fields as $field) {
          echo "<th>" , $field->name, "</th>"; // 필드 목록을 하나씩 꺼내서 이름을 출력
        }
        echo "<th>선택</th>";
        echo "</tr>";

        $numCols = mysqli_num_fields($result); // 필드 개수
        $rowNum = 1;
        while ($row = mysqli_fetch_row($result)) { // 하나의 인스턴스를 꺼냄
          echo "<tr>";
          for ($i = 0; $i < $numCols; $i++) {
            echo "<td>" ,$row[$i], "</td>"; // 인스턴스에 저장된 값들을 컬럼값 별로 출력
          }
          echo "<td><button onClick=runSelect('$rowNum') >선택</button></td>";
          echo "</tr>";
          $rowNum++;
        }
        echo "</table>";
        mysqli_free_result($result); // 메모리 해제
      }
    }

    if(is_resource($conn)) {
      mysqli_close($conn);
    }
  ?>

  <script>
    function runSelect(num) {
      let table = document.getElementById('tableID');
      let rowList = table.rows // 행 개수를 가져옴
      document.getElementById('ID').value = rowList[num].cells[0].innerText // cells: 컬럼값
      document.getElementById('Name').value = rowList[num].cells[1].innerText
      document.getElementById('Age').value = rowList[num].cells[3].innerText
      document.getElementById('Point').value = rowList[num].cells[4].innerText
      document.getElementById('Email').value = rowList[num].cells[5].innerText

      let radioGender = rowList[num].cells[2].innerText
      let radioButton = document.querySelector(`input[name="Gender"][value="${radioGender}"]`)
      if (radioButton) {
        radioButton.checked = true
      }
      console.log(radioButton)
    }

    function modyPoint(mode) {
      let point = document.getElementById('Point').value
      if (mode == 0) point++
      else point--
      document.getElementById('point').value = point
    }
  </script>

  <body>
    <hr>
    <form action="" method="post" id="formMain">
      ID: <input type="text" id="ID" name="ID" readonly/> <br>
      Name: <input type="text" id="Name" name="Name"> <br>
      Gender: <!-- ID: <input type="text" id="Gender" name="Gender"/> <br> -->
        <input type="radio" id="Gender0" name="Gender" value="여"/> 여
        <input type="radio" id="Gender1" name="Gender" value="남"/> 남<br>
      Age: <input type="text" id="Age" name="Age"> <br>
      Point: <input type="text" id="Point" name="Point">
        <span class="button" onclick="modyPoint(0)">▲</span>
        <span class="button" onclick="modyPoint(1)">▼</span> <br>
      Email: <input type="text" id="Email" name="Email"/>
      <button onclick="runSubmit()">확인</button>
    </form>
  </body>
</html>