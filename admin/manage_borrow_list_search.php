<?php
include ("head.php");
include ("foot.php");
$id = $_GET['id'];
$sql = "select * from borrow where id=$id";
$result = $conn->query($sql);
if($result){
    $row = $result->fetch_assoc();
    $book_id = $row['book_id'];
}
$sql_book = "select * from book where id=$book_id";
$result_book = $conn->query($sql_book);
if($result_book) {
    $row_book = $result_book->fetch_assoc();
}
limits('借阅管理');
?>
<div class="layui-body" xmlns="http://www.w3.org/1999/html">
    <div style="padding: 15px;">
        <h2>借阅管理搜索结果</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li  class="layui-this"><a href="mine_borrow_list.php">申请列表</a></li>
                <li ><a href="mine_book_list.php">归还书籍</a></li>
            </ul>
        </div>
        <div class="layui-tab-container">
            <div class="layui-tab-content layui-show">
                <div>
                    <form class="layui-form" action="manage_borrow_list_search.php" method="post">
                        <div class="layui-inline">
                            <input class="layui-input" name="search" style="width: 350px" placeholder="图书名">
                        </div>
                        <button class="layui-btn" type="submit">搜索</button>
                    </form>
                </div>
                <script type="text/html" id="toolbar">
                    <div>
                        <a class="layui-btn  layui-btn-xs layui-btn-normal" lay-event="handle">处理</a>
                    </div>
                </script>
                <table class="layui-table" lay-data="{height:550,
                                                     page: true,
                                                     id:'id_table',
                                                     toolbar:true}"
                       lay-filter="test">
                    <thead>
                    <tr>
                        <td lay-data="{field:'id',sort:true}">ID</td>
                        <td lay-data="{field:'book_name'}">图书名称</td>
                        <td lay-data="{field:'borrow_num'}">申请数量</td>
                        <td lay-data="{field:'state'}">状态</td>
                        <td lay-data="{field:'operate',toolbar:'#toolbar',width:100}">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $search = $_POST['search'];
                    if ($search == '') {
                        alert("搜索内容为空", 'manage_borrow_list.php');
                    }

                    $sql = "SELECT * FROM borrow WHERE book_name LIKE '%" . $search . "%' ORDER BY id";
                    $result = $conn->query($sql);
                    if (!$result || mysqli_num_rows($result) < 1) {
                        alert("暂无数据", 'manage_borrow_list.php');
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($row['state']==0){
                                $state="未处理";
                            }
                            elseif ($row['state']==1){
                                $state="已处理并通过未归还";
                            }
                            elseif ($row['state']==2){
                                $state="已处理未通过";
                            }
                            elseif ($row['state']==3){
                                $state="已处理已通过已归还";
                            }
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["book_name"] . "</td>";
                            echo "<td>" . $row["borrow_num"] . "</td>";
                            echo "<td>" . $state . "</td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <script>
                    layui.use('table', function(){
                        var table = layui.table;
                        table.on('tool(test)', function(obj){
                            var tr = obj.data;
                            let arr = Object.values(tr);
                            if(obj.event === 'handle'){
                                window.location.href = "manage_borrow_handle.php?id="+arr[0];
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
