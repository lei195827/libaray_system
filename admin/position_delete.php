<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM position_other WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
    alert('删除成功', 'position_list.php');
}
else{
    alert('删除失败', 'position_list.php');
}