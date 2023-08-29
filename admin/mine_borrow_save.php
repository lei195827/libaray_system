<?php
include "../conn.php";
$book_id = $_POST['book_id'];
$book_name = $_POST['book_name'];
$borrow_num = $_POST['borrow_num'];
$entry_user = $_SESSION['username'];

$sql = "INSERT INTO borrow(book_name,book_id,borrow_num,entry_user) 
VALUES('$book_name','$book_id','$borrow_num','$entry_user')";
//向user数据表插入一条数据
$result = mysqli_query($conn, $sql);
if ($result) {
    alert('添加成功', 'mine_borrow_list.php');

}
else {
//    输出失败原因
//    echo mysqli_error($conn);
    alert('添加失败:', 'mine_borrow_new_add.php');
}

