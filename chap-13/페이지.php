<html>
    <head></head>
    <style>
    table, td, th {
        border: 1px solid black;
        border-collapse: collapse;
        cursor: pointer;
        text-align: center;
        background-color: whitesmoke;
    }
    .white {
        background-color: white;
    }
    </style>
    <body>
        <center>
        <?php
            $conn = mysqli_connect('localhost', 'root', '1234');
            if ($conn) {
                $db = mysqli_select_db($conn, "sample01_db");
                if ($db) {
                    session_start();
                    $sID = $_SESSION['ssID']; #세션을 통해 얻은 데이터

                    $query = "SELECT m.*, v.cnt, v.last FROM member m INNER JOIN (
                                SELECT ID, DATE_FORMAT(date, '%Y-%m') AS date, COUNT(ID) AS cnt, MAX(date) AS last # Y: 2024, y: 24, M:December, m: 12
                                FROM history 
                                WHERE event = 'Login' # Login 이벤트
                                GROUP BY ID, DATE_FORMAT(date, '%Y-%m') # 아이디, 기간 별로 그룹핑
                            ) v ON m.ID = v.ID WHERE m.ID = '$sID'; "; # 서브쿼리와 함께 존재하면서, 구하고자 하는 id만 반환

                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) >= 1) {
                        $row = mysqli_fetch_assoc($result);
                    }

                    $id = $row['ID'];
                    $name = $row['name'];
                    $mobile = $row['mobile'];
                    $gender = $row['gender'];
                    $addr = $row['addr'];
                    $memo = $row['memo'];
                    $photo = $_SESSION['ssPhoto'];

                    if ($gender == 0) $gender = "여";
                    else $gender == "남";

                    echo "회원 정보 <br> ";
                    echo "이번 달 로그인 횟수: ". $row['cnt'];
                    echo "<table><tr><td>", $id, "</td>";
                    echo "<td>", $name, "</td></tr>";
                    echo "<td colspan=2 ><img src='$photo'></td>";
                    echo "<tr><td>", $mobile, "</td>";
                    echo "<td>", $gender, "</td></tr>";
                    echo "<tr><td colspan=2>", $addr, "</td></tr>";
                    echo "<tr><td colspan=2 class='white'>", $memo, "</td></tr></table>";
                }
            }

            if (is_resource($conn)) {
                mysqli_close($conn);
            }
        ?>
        <a href="게시판.php?inID=<?=$id?>&inName=<?=$name?>">게시판으로...</a>
        </center>
    </body>
</html>