<?php
include ("head.php");
include ("foot.php");
?>
<div class="layui-body" xmlns="http://www.w3.org/1999/html">
    <div style="padding: 15px;">
        <h2>个人中心搜索结果</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li ><a href="mine_info.php">个人信息</a></li>
                <li><a href="mine_borrow_new.php">借阅申请</a></li>
                <li  class="layui-this"><a href="mine_borrow_list_search.php">申请列表</a></li>
                <li ><a href="mine_book_list.php">书籍</a></li>
            </ul>
        </div>
        <div class="layui-tab-container">
            <div class="layui-tab-content layui-show">
                <div>
                    <form class="layui-form" action="mine_borrow_list_search.php" method="post">
                        <div class="layui-inline">
                            <input class="layui-input" name="search_book_name" style="width: 350px" placeholder="图书名">
                        </div>
                        <button class="layui-btn" type="submit">搜索</button>
                    </form>
                </div>
                <script type="text/html" id="toolbar">
                    <div>
                        <a class="layui-btn  layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
                        <a class="layui-btn  layui-btn-xs layui-btn-danger" lay-event="del">删除</a>
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
                        <td lay-data="{field:'borrow_num'}">图书数量</td>
                        <td lay-data="{field:'operate',toolbar:'#toolbar',width:100}">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $search_book_name = $_POST["search_book_name"];
                    if ($search_book_name==''){
                        alert("搜索内容为空",'mine_borrow_list.php');
                    }
                    $entry_user = $_SESSION["username"];
                    $sql = "select * from borrow where book_name like '%" . $search_book_name . "%'
                     and  entry_user='$entry_user' order by id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["book_name"] . "</td>";
                            echo "<td>" . $row["borrow_num"] . "</td>";
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
                            if(obj.event === 'del'){
                                layer.confirm('真的删除么?', function(index){
                                    obj.del();
                                    layer.close(index);
                                    window.location.href = "mine_borrow_delete.php?id="+arr[0];
                                })
                            }else if(obj.event === 'edit'){
                                window.location.href = "mine_borrow_edit.php?id="+arr[0];
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>


</div>
