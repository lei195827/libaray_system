<?php
include ("head.php");
include ("foot.php");
$id = $_GET['id'];
$sql = "select * from position_other where id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
limits('位置管理');
?>
<div class="layui-body">
    <div style="padding: 15px;">
        <!-- 底部固定区域 -->
        <h2>修改位置信息</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">修改位置信息</li>
            </ul>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div layui-row>
                    <div class="layui-row-md8">
                        <form class="layui-form" action="position_edit_update.php" method="post">
                            <div class="layui-form-item">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <label class="layui-form-label">位置名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="position_name" lay-verify="required"
                                           placeholder="输入位置名称"  class="layui-input"
                                           value="<?php echo $row['position_name']?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">位置说明</label>
                                <div class="layui-input-block">
                                    <input type="text" name="other"
                                           placeholder="输入位置说明"  class="layui-input"
                                           value="<?php echo $row['other']?>">
                                </div>
                            </div>
                            <!--  提交按钮-->
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input type="submit" class="layui-btn" value="立即提交">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>