<head>
    <title>회원 가입</title>
    <style>
        label { display: inline-block; width: 100px; margin-top: 10px; }
        input[type="text"], input[type="password"] { width: 200px; }
        .error { color: red; font-size: 0.9em; }
    </style>
    <script>
        function validateForm() {
            var id = document.getElementById("id").value;
            var pw = document.getElementById("pw").value;
            var age = document.getElementById("age").value;
            var ssn = document.getElementById("ssn").value;
            var intro = document.getElementById("intro").value;

            var idPattern = /^[A-Za-z0-9_]{8,}$/;
            var pwPattern = /^[A-Za-z0-9_]{8,}$/;
            var agePattern = /^[0-9]+$/;
            var ssnPattern = /^[0-9]{6}-[1-4][0-9]{6}$/;

            if (!idPattern.test(id)) {
                alert("ID는 8자 이상이며, 영문 대소문자, 숫자, _만 포함해야 합니다.");
                return false;
            }

            if (!pwPattern.test(pw)) {
                alert("비밀번호는 8자 이상이며, 영문 대소문자, 숫자, _만 포함해야 합니다.");
                return false;
            }

            if (!agePattern.test(age)) {
                alert("나이는 숫자만 입력 가능합니다.");
                return false;
            }

            if (!ssnPattern.test(ssn)) {
                alert("주민등록번호는 000000-0xxxxx 형식으로 입력해야 합니다.");
                return false;
            }

            if (intro.length < 10) {
                alert("자기소개는 10자 이상이어야 합니다.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>회원 가입 폼</h2>
    <form action="register.php" method="post" onsubmit="return validateForm()">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" placeholder="8자 이상" required><br>

        <label for="pw">PW:</label>
        <input type="password" id="pw" name="pw" placeholder="8자 이상" required><br>

        <label for="name">이름:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="age">나이:</label>
        <input type="text" id="age" name="age" required><br>

        <label for="ssn">주민등록번호:</label>
        <input type="text" id="ssn" name="ssn" required><br>

        <label>회원구분:</label>
        <input type="radio" id="general" name="membership" value="일반회원" checked>
        <label for="general">일반회원</label>
        <input type="radio" id="special" name="membership" value="특별회원">
        <label for="special">특별회원</label><br>

        <label>등록목적:</label>
        <input type="checkbox" id="hobby" name="purpose[]" value="취미">
        <label for="hobby">취미</label>
        <input type="checkbox" id="business" name="purpose[]" value="창업">
        <label for="business">창업</label>
        <input type="checkbox" id="club" name="purpose[]" value="동호회">
        <label for="club">동호회</label>
        <input type="checkbox" id="etc" name="purpose[]" value="기타">
        <label for="etc">기타</label><br>

        <label for="intro">자기소개(10자 이상):</label><br>
        <textarea id="intro" name="intro" rows="4" cols="50" required></textarea><br>

        <button type="submit">확인</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = htmlspecialchars($_POST['id']);
        $pw = htmlspecialchars($_POST['pw']);
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $ssn = htmlspecialchars($_POST['ssn']);
        $membership = htmlspecialchars($_POST['membership']);
        $purpose = isset($_POST['purpose']) ? implode(", ", $_POST['purpose']) : "없음";
        $intro = htmlspecialchars($_POST['intro']);

        echo "<h3>입력한 정보</h3>";
        echo "ID: $id<br>";
        echo "PW: $pw<br>";
        echo "이름: $name<br>";
        echo "나이: $age<br>";
        echo "주민등록번호: $ssn<br>";
        echo "회원구분: $membership<br>";
        echo "등록목적: $purpose<br>";
        echo "자기소개: $intro<br>";
    }
    ?>
</body>
</html>
