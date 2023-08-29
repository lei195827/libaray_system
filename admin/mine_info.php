<?php
include ("head.php");
include ("foot.php");
?>

<div class="layui-body" xmlns="http://www.w3.org/1999/html">
    <div style="padding: 15px;">
        <h2>个人中心</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this"><a href="mine_info.php">个人信息</a></li>
                <li ><a href="mine_borrow_new.php">借阅申请</a></li>
                <li ><a href="mine_borrow_list.php">申请列表</a></li>
                <li ><a href="mine_book_list.php">我的书籍</a></li>
            </ul>
        </div>
        <div class="layui-tab-container">
            <div class="layui-tab-content layui-show">
                <script type="text/html" id="toolbar">
                    <div>
                        <a class="layui-btn  layui-btn-xs layui-btn-normal" lay-event="edit">编辑</a>
<!--                        <a class="layui-btn  layui-btn-xs layui-btn-danger" lay-event="del">删除</a>-->
                    </div>
                </script>
                <table class="layui-table" lay-data="{height:550,
<!--                                                     page: true,-->
                                                     id:'id_table',
                                                     toolbar:true}"
                       lay-filter="test">
                    <thead>
                    <tr>
                        <td lay-data="{field:'id',sort:true}">ID</td>
                        <td lay-data="{field:'username'}">用户名</td>
                        <td lay-data="{field:'real_name'}">真实姓名</td>
                        <td lay-data="{field:'operate',toolbar:'#toolbar',width:100}">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $username = $_SESSION['username'];
                    $sql = "select * from user where username='$username' order by id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["real_name"] . "</td>";
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
                            if(obj.event === 'edit'){
                                window.location.href = "mine_info_edit.php?id="+arr[0];
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>


</div>
