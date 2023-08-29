<?php
include "../conn.php";
$inputId = $_POST['id'];
$inputUsername = $_POST['username'];
$inputPassword1 = $_POST['password1'];
$inputPassword2 = $_POST['password2'];
$real_name = $_POST['real_name'];
//查询数据处理
if($inputPassword1 != $inputPassword2){
    alert('两次密码不一样', 'mine_info.php');
}
if (strlen($inputUsername) < 5) {
    alert('用户名不能小于5位', 'mine_info.php');
    exit();
}
//判段username是否重复
//$sql = "SELECT * FROM user WHERE username = '$inputUsername'";
//if (mysqli_query($conn, $sql)) {
//    alert('用户名重复', 'mine_info.php');
//}

//修改更新用户信息
$sql = "UPDATE user SET 
//                username = '$inputUsername',
                password = '$inputPassword1',
                real_name = '$real_name'
            WHERE id = $inputId";
if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'mine_info.php');
}
else {
    alert('修该失败', 'mine_info.php');
}