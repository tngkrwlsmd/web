<html>
  <body>
    <?php
    $conn = mysqli_connect("localhost", "root", "1234");

    if($conn) {
      echo "db 연결 성공! <br>";
      $db = mysqli_select_db($conn, "sample01_db");

      if ($db) {
        echo "데이터베이스 선택 성공! <br>";
        $query = "SELECT * FROM guest";
        $result = mysqli_query($conn, $query);
        $numCols = mysqli_num_fields($result);
    ?>

    <table width = '600' border='2' bordercolor='blue' cellpadding='10'>
      <tr>
        <?php /* 필드명을 반환
          mysqli_field_seek($result, 1);
          $field_info = mysqli_fetch_field($result);
          echo $field_info->name; */
        ?>
        <td bgcolor="#FFFF00" align="center"><b> 아이디</b></td>
        <td bgcolor="#FFFF00" align="center"><b> 성명</b></td>
        <td bgcolor="#FFFF00" align="center"><b> 성별</b></td>
        <td bgcolor="#FFFF00" align="center"><b> 나이</b></td>
        <td bgcolor="#FFFF00" align="center"><b> 포인트</b></td>
        <td bgcolor="#FFFF00" align="center"><b> 이메일</b></td>
      </tr>

      <?php
            while ($row = mysqli_fetch_row($result)) {
              echo "<tr>";
              for ($i = 0; $i < $numCols; $i++) {
                echo "<td>" ,$row[$i], "</td>";
              }
              echo "</tr>";
            }
            mysqli_free_result($result); // 메모리 해제
      ?>

    </table>
    <hr>

    <?php
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_array($result, MYSQLI_NUM); // 숫자로
      echo $row[0], ", ", $row[1], ", ", $row[2], ", ", $row[3], ", ", $row[4], ", ", $row[5], "<br>";
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC); // 필드명으로
      echo $row["id"], ", ", $row["name"], ", ", $row["gender"], ", ", $row["age"], ", ", $row["point"], ", ", $row["email"], "<br>";
      $row = mysqli_fetch_assoc($result);
      echo $row["id"], ", ", $row["name"], ", ", $row["gender"], ", ", $row["age"], ", ", $row["point"], ", ", $row["email"], "<br>";

      mysqli_free_result($result);
      echo "<hr>";
      
      $result = mysqli_query($conn, $query);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      foreach ($rows as $row) {
        echo $row["id"], ", ", $row["name"], ", ", $row["gender"], ", ", $row["age"], ", ", $row["point"], ", ", $row["email"], "<br>";
      }
      mysqli_free_result($result);
    ?>

    <?php
        } else {
          echo "데이터베이스 선택 실패! <br>";
        }

      } else {
        echo "db 연결 실패! <br>";
      }

      if(is_resource($conn)) {
        mysqli_close($conn);
      }
    ?>
  </body>
</html>