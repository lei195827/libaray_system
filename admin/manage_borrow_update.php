<?php
include "../conn.php";
$id = $_POST['id'];
$inputId = $_POST['book_id'];
$borrow_num = $_POST['borrow_num'];
$book_num = $_POST['book_num'];
$state = $_POST['state'];


if($state==1){
    $book_num=$book_num-$borrow_num;
    $sql = "UPDATE book SET book_num = $book_num WHERE id = $inputId";
    $result = mysqli_query($conn, $sql);
}
//修改更新用户信息
$sql = "UPDATE borrow SET
                state = $state,
                borrow_num = $borrow_num
            WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'manage_borrow_list.php');
} else {
    alert('修该失败', 'manage_borrow_list.php');
}