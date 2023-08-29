<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM borrow WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
    alert('删除成功', 'mine_borrow_list.php');
}
else{
    alert('删除失败', 'mine_borrow_list.php');
}