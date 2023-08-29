<?php
include ("head.php");
include ("foot.php");
limits('分类管理');
?>

<div class="layui-body" xmlns="http://www.w3.org/1999/html">
    <div style="padding: 15px;">
        <h2>分类管理</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this"><a href="assort_list.php">分类列表</a></li>
                <li ><a href="assort_new.php">新增分类</a></li>
            </ul>
        </div>
        <div class="layui-tab-container">
            <div class="layui-tab-content layui-show">
                <div>
                    <form class="layui-form" action="assort_list_search.php" method="post">
                        <div class="layui-inline">
                            <input class="layui-input" name="search_assort_name" style="width: 350px" placeholder="分类名">
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
                        <td lay-data="{field:'assort_name'}">分类名</td>
                        <td lay-data="{field:'other'}">分类说明</td>
                        <td lay-data="{field:'operate',toolbar:'#toolbar',width:100}">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "select * from assort order by id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["assort_name"] . "</td>";
                            echo "<td>" . $row["other"] . "</td>";
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
                                    window.location.href = "assort_delete.php?id="+arr[0];
                                })
                            }else if(obj.event === 'edit'){
                                window.location.href = "assort_edit.php?id="+arr[0];
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>


</div>
