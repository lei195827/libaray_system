<?php
include ("head.php");
include ("foot.php");
?>
    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <blockquote class="layui-elem-quote layui-text">
                欢迎<?php echo $_SESSION['username'];?>使用图书管理系统
            </blockquote>
            <div class="layui-card layui-panel">
                <div class="layui-card-header">
                    下面是充数内容，为的是出现滚动条
                </div>
                <div class="layui-card-body">
                </div>
            </div>
            <br><br>
        </div>
    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        图书管理系统 powered by layui
    </div>
</div>
