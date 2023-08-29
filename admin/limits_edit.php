<?php
include ("head.php");
include ("foot.php");
$id = $_GET['id'];
$sql = "select * from user where id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
function checkbox_limits($limits){
    $conn = @mysqli_connect('localhost', 'root', 'root', 'lsmdb')
    or die('数据处理错误');
    mysqli_query($conn, "set names utf8");
    $id = $_GET['id'];
    $sql = "select * from user where id=$id and limits like '%" . $limits . "%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo 'checked';
    }
}
limits('权限管理');
?>
<div class="layui-body">
    <div style="padding: 15px;">
        <!-- 底部固定区域 -->
        <h2>修改用户信息</h2>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this">修改用户信息</li>
            </ul>
        </div>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <div layui-row>
                    <div class="layui-row-md8">
                        <form class="layui-form" action="limits_update.php" method="post">
                            <div class="layui-form-item">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <label class="layui-form-label">用户名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="username" lay-verify="required"
                                           placeholder="请输入昵称（必填）"  class="layui-input"
                                    value="<?php echo $row['username']?>"
                                    disabled readonly>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">登陆密码</label>
                                <div class="layui-input-block">
                                    <input type="text" name="password1" lay-verify="required"
                                           placeholder="请输入密码（必填）"  class="layui-input"
                                    value="<?php echo $row['password']?>"
                                           disabled readonly>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">再次输入密码</label>
                                <div class="layui-input-block">
                                    <input type="text" name="password2" lay-verify="required"
                                           placeholder="再次输入密码（必填）"  class="layui-input"
                                    value="<?php echo $row['password']?>"
                                           disabled readonly>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">真实姓名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="real_name"
                                           placeholder="请输入真实姓名"  class="layui-input"
                                    value="<?php echo $row['real_name']?>"
                                           disabled readonly>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">权限设置</label>
                                <div class="layui-input-block">
                                    <input type="checkbox" name="limits0"
                                           value="图书管理" title="图书管理" <?php echo checkbox_limits('图书管理'); ?>>
                                    <input type="checkbox" name="limits1"
                                           value="分类管理" title="分类管理" <?php echo checkbox_limits('分类管理'); ?>>
                                    <input type="checkbox" name="limits2"
                                           value="位置管理" title="位置管理" <?php echo checkbox_limits('位置管理'); ?>>
                                    <input type="checkbox" name="limits3"
                                           value="借阅管理" title="借阅管理" <?php echo checkbox_limits('借阅管理'); ?>>
                                    <input type="checkbox" name="limits4"
                                           value="用户管理" title="用户管理" <?php echo checkbox_limits('用户管理'); ?>>
                                    <input type="checkbox" name="limits5"
                                           value="权限管理" title="权限管理" <?php echo checkbox_limits('权限管理'); ?>>
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