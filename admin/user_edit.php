<?php
include ("head.php");
include ("foot.php");
$id = $_GET['id'];
$sql = "select * from user where id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
limits('用户管理');
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
                        <form class="layui-form" action="user_edit_update.php" method="post">
                            <div class="layui-form-item">
                                <input type="hidden" name="id" value="<?php echo $row['id']?>">
                                <label class="layui-form-label">用户名称</label>
                                <div class="layui-input-block">
                                    <input type="text" name="username" lay-verify="required"
                                           placeholder="请输入昵称（必填）"  class="layui-input"
                                    value="<?php echo $row['username']?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">登陆密码</label>
                                <div class="layui-input-block">
                                    <input type="text" name="password1" lay-verify="required"
                                           placeholder="请输入密码（必填）"  class="layui-input"
                                    value="<?php echo $row['password']?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">再次输入密码</label>
                                <div class="layui-input-block">
                                    <input type="text" name="password2" lay-verify="required"
                                           placeholder="再次输入密码（必填）"  class="layui-input"
                                    value="<?php echo $row['password']?>">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">真实姓名</label>
                                <div class="layui-input-block">
                                    <input type="text" name="real_name"
                                           placeholder="请输入真实姓名"  class="layui-input"
                                    value="<?php echo $row['real_name']?>">
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