<html>
<head></head>
<style>
    table, td, th {
        border: 1px solid black;
        border-collapse: collapse;
        cursor: pointer;
    }
</style>
<body>
    <center>
        <h3>Log IN</h3>
        <form action="" method="post" id="frmMain">
            <table>
                <tr><td align="right">ID:</td><td><input type="text" id="id" name="id" /></td></tr>
                <tr><td align="right">PW:</td><td><input type="password" id="pw" name="pw" /></td></tr>
            </table>
            <input type="submit" value="확인" />
            <input type="reset" value="취소" />
        </form>

        <form action="페이지.php" method="post" id="formGo">
            <input type="hidden" id="goID" name="goID" />
            <input type="hidden" id="goName" name="goName" />
            <input type="hidden" id="goMobile" name="goMobile" />
            <input type="hidden" id="goGender" name="goGender" />
            <input type="hidden" id="goAddr" name="goAddr" />
            <input type="hidden" id="goMemo" name="goMemo" />
        </form>
    </center>
</body>

<?php
if (isset($_POST['id']) && isset($_POST['pw'])) {
    $conn = mysqli_connect('localhost', 'root', '1234');

    if ($conn) {
        $db = mysqli_select_db($conn, "sample01_db");
        if ($db) {
            $id = mysqli_real_escape_string($conn, $_POST["id"]);
            $pw = mysqli_real_escape_string($conn, $_POST["pw"]);

            $query = "SELECT * FROM member WHERE ID = '$id' AND pw = '$pw'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                setcookie("ckID", $row['ID']); // 쿠키 변수 저장, 실제로 DB에 저장된 ID
                session_start(); # 세선 통신 시작
                $_SESSION['ssName'] = $row['name']; # ssName이라는 세션 변수에, name 저장
                ?>
                <script>
                    document.getElementById('goID').value = '<?= $row['ID'] ?>';
                    document.getElementById('goName').value = '<?= $row['name'] ?>';
                    document.getElementById('goMobile').value = '<?= $row['mobile'] ?>';
                    document.getElementById('goGender').value = '<?= $row['gender'] ?>';
                    document.getElementById('goAddr').value = '<?= $row['addr'] ?>';
                    document.getElementById('goMemo').value = '<?= $row['memo'] ?>';
                    document.getElementById('formGo').submit();
                </script>
                <?php
            } else {
                echo "로그인 실패. 아이디 또는 비밀번호를 확인하세요.";
            }
        } else {
            echo "Database 선택 실패.";
        }
    } else {
        echo "Database 연결 실패.";
    }

    if (is_resource($conn)) {
        mysqli_close($conn);
    }
}
?>
</html>