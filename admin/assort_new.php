<?php
include ("head.php");
include ("foot.php");
limits('分类管理');
?>
    <div class="layui-body">
        <div style="padding: 15px;">
        <!-- 底部固定区域 -->
        <h2>管理分类</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li><a href="assort_list.php" >分类列表</a></li>
                    <li  class="layui-this"><a href="assort_new.php"  >新增分类</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div layui-row>
                        <div class="layui-row-md8">
                            <form class="layui-form" action="assort_save.php" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">分类名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="assort_name" lay-verify="required"
                                               placeholder="输入分类名称"  class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">分类说明</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="other"
                                               placeholder="输入分类说明"  class="layui-input">
                                    </div>
                                </div>
                                <!--  提交按钮-->
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <input type="submit" class="layui-btn" value="立即提交">
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
</div>