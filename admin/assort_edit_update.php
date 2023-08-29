<?php
include "../conn.php";
$inputId = $_POST['id'];
$assort_name = $_POST['assort_name'];
$other = $_POST['other'];

//修改更新用户信息
$sql = "UPDATE assort SET 
                assort_name = '$assort_name',
                other = '$other'
            WHERE id = $inputId";
if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'assort_list.php');
}
else {
    alert('修该失败', 'assort_list.php');
}