<?php
include ("head.php");
include ("foot.php");
limits('位置管理');
?>

<div class="layui-body" xmlns="http://www.w3.org/1999/html">
    <div style="padding: 15px;">
        <h2>位置管理</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">搜索结果</a></li>
            </ul>
        </div>
        <div class="layui-tab-container">
            <div class="layui-tab-content layui-show">
                <div>
                    <form class="layui-form" action="user_list_search.php" method="post">
                        <div class="layui-inline">
                            <input class="layui-input" name="search_position_name" style="width: 350px" placeholder="位置名">
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
                        <td lay-data="{field:'username'}">位置名称</td>
                        <td lay-data="{field:'real_name'}">位置说明</td>
                        <td lay-data="{field:'operate',toolbar:'#toolbar',width:100}">操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $position_name = $_POST['search_position_name'];
                    if ($position_name==''){
                        alert("搜索内容为空",'position_list.php');
                    }
                    $sql = "select * from position_other where position_name='$position_name' order by id";
                    $result = $conn->query($sql);
                    //若未检索到结果
                    if($result->num_rows==0){
                        alert('无结果','position_list.php');
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["position_name"] . "</td>";
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
                                    window.location.href = "user_delete.php?id="+arr[0];
                                })
                            }else if(obj.event === 'edit'){
                                window.location.href = "user_edit.php?id="+arr[0];
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </div>


</div>
