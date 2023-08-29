<?php
include "../conn.php";
$inputId = $_POST['id'];
$limits = array($_POST['limits0'], $_POST['limits1'], $_POST['limits2'], $_POST['limits3'], $_POST['limits4'],
    $_POST['limits5']);
// 让limits变成一个字符串，每个元素用单引号括起来，并用空格隔开
$limits = implode(" ",$limits);

// 修改更新用户信息
$sql = "UPDATE user SET 
                limits = '$limits'
            WHERE id = $inputId";
if (mysqli_query($conn, $sql)) {
    alert('修改成功', 'limits_list.php');
} else {
    alert('修改失败', 'limits_list.php');
}
