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

    echo "ID: $id<br>";
    echo "Name: $name<br>";
    echo "Mobile: $mobile<br>";
    echo "Gender: $gender<br>";
    echo "Address: $addr<br>";
    echo "Memo: $memo<br>";
} else {
    echo "데이터가 전달되지 않았습니다.";
}
?>