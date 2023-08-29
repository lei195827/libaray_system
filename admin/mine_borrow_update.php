<?php
include "../conn.php";
$inputId = $_POST['book_id'];
$borrow_num = $_POST['borrow_num'];


//修改更新用户信息
$sql = "UPDATE borrow SET 
                borrow_num = $borrow_num
            WHERE id = $inputId";
if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'mine_borrow_list.php');
}
else {
    alert('修该失败', 'mine_borrow_list.php');
}