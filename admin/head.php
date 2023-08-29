<?php
include ('../conn.php');
//确认登录权限
if (!isset($_SESSION['username'])) {
    alert('请重新登陆', '../login.php');
}
//当表borrow的数据数量大于3条时，发出小红点提醒
$sql = "SELECT * FROM borrow where state=0";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >= 3) {
    $span = '<span class="layui-badge">' . mysqli_num_rows($result) . '</span>';
} else {
    $span = ''; // 这里可以选择不显示小红点
}
function limits($limits){
    $conn = @mysqli_connect('localhost', 'root', 'root', 'lsmdb')
    or die('数据处理错误');
    mysqli_query($conn, "set names utf8");
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user where username='$username' and limits like '%" . $limits . "%'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)<1){
        alert('您无权访问这个页面','index.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>管理界面大布局示例 - Layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../layui/css/layui.css" rel="stylesheet">../css/layui.css" rel="stylesheet">
<!--    <script type="text/javascript" src="../layui/layui.js"></script>-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-hide-xs layui-bg-black">图书管理系统</div>
        <!-- 头部区域（可配合layui 已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <!-- 移动端显示 -->
            <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-header-event="menuLeft">
                <i class="layui-icon layui-icon-spread-left"></i>
            </li>
            <li class="layui-nav-item layui-hide-xs"><a href="index.php">首页</a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide-xs">
                <a href="../logout.php">注销</a>
            </li>
            <li class="layui-nav-item layui-hide layui-show-sm-inline-block">
                <a href="javascript:;">
                    <img src="https://unpkg.com/outeres@0.0.10/img/layui/icon-v2.png" class="layui-nav-img">
                    个人中心
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="mine_info.php">个人信息</a></dd>
                    <dd><a href="mine_borrow_new.php">借阅申请</a></dd>
                    <dd><a href="mine_borrow_list.php">申请列表</a></dd>
                    <dd><a href="mine_book_list.php">书籍</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="javascript:;">图书管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="book_new.php">新增图书</a></dd>
                        <dd><a href="book_list.php">图书列表</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">分类管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="assort_list.php">分类列表</a></dd>
                        <dd><a href="assort_new.php">新增分类</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">位置管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="position_list.php">位置列表</a></dd>
                        <dd><a href="position_new.php">新增位置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">借阅管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="manage_borrow_list.php">申请列表<?php echo $span; ?></a></dd>
<!--                        <dd><a href="javascript:;">申请列表--><?php //echo $span; ?><!--</a></dd>-->
                        <dd><a href="javascript:;">归还书籍</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="user_list.php">用户列表</a></dd>
                        <dd><a href="user_new.php">新增用户</a></dd>
<!--                        <dd><a href="user_delete.php;">删除用户</a></dd>-->
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">权限设置</a>
                    <dl class="layui-nav-child">
                        <dd><a href="limits_list.php">修改权限</a></dd>
<!--                        <dd><a href="javascript:;">修改权限</a></dd>-->
                    </dl>
                </li>
                <!--                <li class="layui-nav-item"><a href="javascript:;">click menu item</a></li>-->
                <!--                <li class="layui-nav-item"><a href="javascript:;">the links</a></li>-->
            </ul>
        </div>
    </div>