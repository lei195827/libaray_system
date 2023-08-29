<?php
include "../conn.php";
$position_name = $_POST['position_name'];
$other = $_POST['other'];
//查询数据处理
if (strlen($position_name) < 1) {
    alert('位置不能小于5位', 'position_new.php');
    exit();
}
//判断用户名是否已经在数据库中存在
$sql = "SELECT * FROM position_other WHERE position_name = '$position_name'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    alert('位置已存在', 'position_new.php');
}

//向user数据表插入一条数据
$sql = "INSERT INTO position_other(position_name,other) VALUES('$position_name','$other')";
$result = mysqli_query($conn, $sql);
if ($result) {
    alert('添加成功', 'position_list.php');

}
else {
    alert('添加失败:', 'position_new.php');
}