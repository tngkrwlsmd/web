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

                session_start();
                $_SESSION['ssID'] = $row['ID'];
                $_SESSION['ssPhoto'] = $row['photo'];
                $id = $row['ID'];
                $event = 'Login';
                $memo = '';

                $query = "INSERT INTO history (ID, date, event, memo) VALUES ('$id', NOW(), '$event', '$memo');";
                mysqli_query($conn, $query);
                ?>
                <script>
                    document.location='페이지.php'
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