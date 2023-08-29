<?php
include ("head.php");
include ("foot.php");
limits('用户管理');
?>
    <div class="layui-body">
        <div style="padding: 15px;">
        <!-- 底部固定区域 -->
        <h2>新增用户</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li><a href="user_list.php" >用户列表</a></li>
                    <li class="layui-this"><a href="user_new.php" >新增用户</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div layui-row>
                        <div class="layui-row-md8">
                            <form class="layui-form" action="user_save.php" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">用户名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="username" lay-verify="required"
                                               placeholder="请输入昵称（必填）"  class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">登陆密码</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="password1" lay-verify="required"
                                               placeholder="请输入密码（必填）"  class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">再次输入密码</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="password2" lay-verify="required"
                                               placeholder="请再次输入密码（必填）"  class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">真实姓名</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="real_name"
                                               placeholder="请输入真实姓名"  class="layui-input">
                                    </div>
                                </div>
                                <!--  提交按钮-->
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <input type="submit" class="layui-btn" value="立即提交">
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>