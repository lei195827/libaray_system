<!DOCTYPE html>
<html LANG="en">
<head>
    <meta charset="UTF-8">
    <title>注册界面</title>
    <link rel="stylesheet" type="text/css" href="layui/css/layui.css">
    <script type="text/javascript" src="layui/layui.js"></script>
    <style>
        body {
            background-image: url('images/img.png'); /* 替换为你的图片文件名和路径 */
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
<div class="layui-container">
    <div style="height: 150px;"></div>
    <div class="layui-row">
        <div class="layui-col-md4" style="height: 150px;"></div>
        <div class="layui-col-md4" style="height: 150px;">
            <p style="text-align: center;font-size: 35px;color: #009688">注册页面</p>
            <div style="height: 20px;"></div>
            <form class="layui-form" action="add_check.php" method="post">
                <input type="text" name="username" placeholder="请输入用户名" class="layui-input">
                <div style="height: 20px;"></div>
                <input type="password" name="password1" placeholder="请设置密码" class="layui-input">
                <div style="height: 20px;"></div>
                <input type="password" name="password2" placeholder="请再次输入密码" class="layui-input">
                <div style="height: 20px;"></div>
                <input type="submit" value="注册" class="layui-btn layui-btn-normal layui-btn-fluid">
            </form>
            <a href="login.php" style="text-align: center;font-size: 20px;color: #006600">返回登陆界面</a>
        </div>
        <div class="layui-col-md4" style="height: 150px;"></div>
    </div>
</div>
<script>
    layui.use('form',function (){
        var form = layui.form;
    })
</script>
</body>
</html>
