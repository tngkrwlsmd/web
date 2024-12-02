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
            if (isset($_POST['goID'])) {
                $id = $_POST['goID'];
                $name = $_POST['goName'];
                $mobile = $_POST['goMobile'];
                $gender = $_POST['goGender'];
                $addr = $_POST['goAddr'];
                $memo = $_POST['goMemo'];

                if ($gender == 0) $gender = "여";
                else $gender == "남";

                echo $_COOKIE['ckID'], "<br>";
                session_start(); // 세선 시작
                echo $_SESSION['ssName'], "<br>";

                echo $name, "님 환영합니다.<br>";
                echo "회원 정보";
                echo "<table><tr><td>", $id, "</td>";
                echo "<td>", $name, "</td></tr>";
                echo "<tr><td>", $mobile, "</td>";
                echo "<td>", $gender, "</td></tr>";
                echo "<tr><td colspan=2>", $addr, "</td></tr>";
                echo "<tr><td colspan=2 class='white'>", $memo, "</td></tr></table>";
            } else {
                echo "데이터가 전달되지 않았습니다.";
            }
        ?>
        <a href="게시판.php?inID=<?=$id?>&inName=<?=$name?>">게시판으로...</a>
        </center>
    </body>
</html>