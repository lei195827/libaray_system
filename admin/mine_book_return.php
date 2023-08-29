<?php
include "../conn.php";
$id = $_GET['id'];
$sql = "SELECT * FROM borrow WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$state = $row['state'];
if ($state == 2 || $state == 0) {
    alert('该书籍还未借阅成功', 'mine_book_list.php');
    exit();
}
$book_id = $row['book_id'];
$book_sql = "SELECT * FROM book WHERE id = $book_id";
$book_result = mysqli_query($conn, $book_sql);
$book_row = mysqli_fetch_assoc($book_result);
$book_num = $book_row['book_num'];
$borrow_num = $row['borrow_num'];
$book_num = $book_num + $borrow_num;
$sql_book = "UPDATE book SET book_num=$book_num WHERE id = $book_id";
$book_result = mysqli_query($conn, $sql_book);
$sql_borrow = "update borrow set state = 3 where id=$id";
$result_borrow = mysqli_query($conn, $sql_borrow);
if($result_borrow and $book_row){
    alert('还书成功', 'mine_book_list.php');
}else{
    alert('操作失败', 'mine_book_list.php');
}

