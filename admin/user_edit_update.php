<?php
include "../conn.php";
$inputId = $_POST['id'];
$inputUsername = $_POST['username'];
$inputPassword1 = $_POST['password1'];
$inputPassword2 = $_POST['password2'];
$real_name = $_POST['real_name'];
//查询数据处理
if($inputPassword1 != $inputPassword2){
    alert('两次密码不一样', 'user_list.php');
}
if (strlen($inputUsername) < 5) {
    alert('用户名不能小于5位', 'user_list.php');
    exit();
}

//修改更新用户信息
$sql = "UPDATE user SET username = '$inputUsername',
                password = '$inputPassword1',
                real_name = '$real_name'
            WHERE id = $inputId";
if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'user_list.php');
}
else {
    alert('修该失败', 'user_list.php');
}