<?php
  $conn = mysqli_connect("localhost", "root", "1234");

  if($conn) {
    echo "db 연결 성공! <br>";
    $db = mysqli_select_db($conn, "sample01_db");

    if ($db) {
      echo "데이터베이스 선택 성공! <br>";

      /* $query = "SELECT 1 
      FROM Information_schema.tables
      WHERE table_name = 'guest'
      AND table_schema='sample01_db'";

      $result = mysqli_query($conn, $query);
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo "guest table 이미 존재함 <br>";
        } else {
          echo "guest table 없음 <br>";
        }
      } */
      
      $query = "CREATE TABLE IF NOT EXISTS guest (
        id varchar(12) NOT NULL,
        name varchar(50) NOT NULL,
        gender varchar(4),
        age int,
        point int,
        email varchar(50),
        PRIMARY KEY (id)
      );";

      $result = mysqli_query($conn, $query);
      if ($result) {
        echo "guest table 생성 성공! <br>";
      } else {
        echo "guest table 생성 실패! <br>";
      }

      /* $query = "INSERT INTO guest VALUES 
      ('sagang', '강산애', '남', '23', '250', 'sagang@hanmail.net'),
      ('sbhwang', '황산벌', '남', '37', '308', 'sbhwang@nate.com'),
      ('grlee', '이겨레', '여', '19', '123', 'grlee@hanmail.net'),
      ('cskim', '김찬성', '남', '45', '569', 'cskim@naver.com'),
      ('nrshin', '신나라', '여', '33', '625', 'nrshin@hanmail.net');";

      $result = mysqli_query($conn, $query);
      if ($result) {
        echo "guest table 생성 성공! <br>";
      } else {
        echo "guest table 생성 실패! <br>";
      }
      */

      $query = "SELECT * FROM guest;";
      $result = mysqli_query($conn, $query);

      $result = mysqli_query($conn, $query);
      if ($result) {
        echo "레코드 삽입 성공! <br>";
      } else {
        echo "레코드 삽입 실패! <br>";
      }

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