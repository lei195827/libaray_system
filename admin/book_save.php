<?php
include "../conn.php";
$book_name = $_POST['book_name'];
$book_assort = $_POST['book_assort'];
$book_position = $_POST['book_position'];
$book_num = $_POST['book_num'];
//判断书名是否已经在数据库中存在
$sql = "SELECT * FROM book WHERE position_name = '$book_name'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    alert('书名已存在', 'book_new.php');
}

//向user数据表插入一条数据
$sql = "INSERT INTO book(book_name,book_assort,book_position,book_num) VALUES('$book_name','$book_assort',
                                                                      '$book_position',$book_num)";
$result = mysqli_query($conn, $sql);
if ($result) {
    alert('添加成功', 'book_list.php');

}
else {
//    输出失败原因
//    echo mysqli_error($conn);
    alert('添加失败:', 'book_new.php');
}