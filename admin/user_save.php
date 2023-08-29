<?php
include "../conn.php";
$inputUsername = $_POST['username'];
$inputPassword1 = $_POST['password1'];
$inputPassword2 = $_POST['password2'];
$real_name = $_POST['real_name'];
//查询数据处理
if($inputPassword1 != $inputPassword2){
    alert('两次密码不一样', 'user_new.php');
}
if (strlen($inputUsername) < 5) {
    alert('用户名不能小于5位', 'user_new.php');
    exit();
}
//判断用户名是否已经在数据库中存在
$sql = "SELECT * FROM user WHERE username = '$inputUsername'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    alert('用户名存在', 'user_new.php');
}

//向user数据表插入一条数据
$sql = "INSERT INTO user(username,password,real_name) VALUES('$inputUsername','$inputPassword1','$real_name')";
$result = mysqli_query($conn, $sql);
if ($result) {
    alert('添加成功', 'user_list.php');
}
else {
    alert('添加失败', 'user_new.php');
}