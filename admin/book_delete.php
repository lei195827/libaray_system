<?php
include('../conn.php');
$id = $_GET['id'];
$sql = "DELETE FROM book WHERE `id` = '$id'";
$result = mysqli_query($conn, $sql);
if($result){
    alert('删除成功', 'book_list.php');
}
else{
    alert('删除失败', 'book_list.php');
}