<?php
include "../conn.php";
$inputId = $_POST['id'];
$book_name = $_POST['book_name'];
$book_assort = $_POST['book_assort'];
$book_position= $_POST['book_position'];
$book_num= $_POST['book_num'];

$sql = "UPDATE book SET 
                book_name = '$book_name',
                book_assort = '$book_assort',
                book_position = '$book_position',
                book_num = '$book_num'        
            WHERE id = $inputId";


if (mysqli_query($conn, $sql)) {
    alert('修该成功', 'book_list.php');
}
else {
//    输出错误原因
//    error_name mysqli_error($conn);
    alert('修该失败', 'book_list.php');
}