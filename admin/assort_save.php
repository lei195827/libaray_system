<?php
include "../conn.php";
$assort_name = $_POST['assort_name'];
$other = $_POST['other'];
//查询数据处理
if (strlen($assort_name) < 5) {
    alert('用户名不能小于5位', 'user_new.php');
    exit();
}
//判断用户名是否已经在数据库中存在
$sql = "SELECT * FROM assort WHERE assort_name = '$assort_name'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    alert('分类已存在', 'assort_new.php');
}

//向user数据表插入一条数据
$sql = "INSERT INTO assort(assort_name,other) VALUES('$assort_name','$other')";
$result = mysqli_query($conn, $sql);
if ($result) {
    alert('添加成功', 'assort_list.php');
}
else {
    alert('添加失败', 'assort_new.php');
}