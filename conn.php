<?php
header('Content-Type:text/html ;charset=utf-8');
//链接数据库
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'lsmdb';
$conn = mysqli_connect($servername, $username, $password, $database);
if ($conn->connect_error) {
    die('这是后台的错误信息：' . $conn->connect_error);
}

//弹窗方法
function alert($str,$url){
    echo "<script>alert('$str');location.href='$url'</script>";
}
session_start();