<?php
include "../conn.php";
$inputId = $_POST['id'];
$position_name = $_POST['position_name'];
$other = $_POST['other'];

//修改更新用户信息
$sql = "UPDATE position_other SET 
                position_name = '$position_name',
                other = '$other'
            WHERE id = $inputId";


if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'position_list.php');
}
else {
//    输出错误原因
//    error_name mysqli_error($conn);
    alert('修该失败', 'position_list.php');
}