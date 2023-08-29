<?php
include ("head.php");
include ("foot.php");
$id = $_GET['id'];
$sql = "select * from borrow where id=$id";
$result = $conn->query($sql);
if($result){
    $row = $result->fetch_assoc();
    $book_id = $row['book_id'];
}
$sql_book = "select * from book where id=$book_id";
$result_book = $conn->query($sql_book);
if($result_book){
    $row_book = $result_book->fetch_assoc();
}
limits('借阅管理');
?>
    <div class="layui-body">
        <div style="padding: 15px;">
        <!-- 底部固定区域 -->
        <h2>个人中心</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
<!--                    <li><a href="book_list.php" >图书列表</a></li>-->
<!--                    <li  class="layui-this"><a href="book_new.php">新增图书</a></li>-->
<!--                    <li><a href="book_damage.php" >损坏管理</a></li>-->
                    <li class="layui-this"><a href="book_new.php">借阅申请详情</a></li>
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div layui-row>
                        <div class="layui-row-md8">
                            <form class="layui-form" action="manage_borrow_update.php" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">借阅人</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_name" lay-verify="required"
                                               placeholder="借阅人"  class="layui-input "
                                               value="<?php echo $row['entry_user']?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">图书名称</label>
                                    <div class="layui-input-block">
                                        <input value="<?php echo $id;?>" type="hidden" name="id">
                                        <input value="<?php echo $book_id;?>" type="hidden" name="book_id">
                                        <input type="hidden" name="book_name" value="<?php echo $row['book_name']?>">
                                        <input type="hidden" name="book_num" value="<?php echo $row_book['book_num']?>">
                                        <input type="hidden" name="borrow_num" value="<?php echo $row['borrow_num']?>">
                                        <input type="text" name="book_name" lay-verify="required"
                                               placeholder="输入图书名称"  class="layui-input "
                                        value="<?php echo $row_book['book_name']?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">图书类型</label>
                                    <div class="layui-input-block">
                                        <select name="book_assort" lay-verify="required" disabled readonly>
                                            <option value="">请选择类型</option>
                                            <?php
                                            $sql = "select * from assort order by id";
                                            $result = $conn->query($sql);
                                            if ($result){
                                                while($rows = $result->fetch_assoc()) {
                                                    if ($rows['assort_name'] == $row_book['book_assort']) {
                                                        echo "<option value=\"" . $rows['assort_name'] . "\" selected>" . $rows['assort_name'] . "</option>";
                                                    } else {
                                                        echo "<option value=\"" . $rows['assort_name'] . "\">" . $rows['assort_name'] . "</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">存放位置</label>
                                    <div class="layui-input-block">
                                        <select name="book_position" lay-verify="required" disabled readonly>
                                            <option value="">请选择存放位置</option>
                                            <?php
                                            $sql = "select * from position_other order by id";
                                            $result = $conn->query($sql);
                                            if ($result){
                                                while($rows = $result->fetch_assoc()) {
                                                    if ($rows['position_name'] == $row_book['book_position']) {
                                                        echo "<option value=\"" . $rows['position_name'] . "\" selected>"
                                                            . $rows['position_name'] . "</option>";
                                                    } else {
                                                        echo "<option value=\"" . $rows['position_name'] . "\">"
                                                            . $rows['position_name'] . "</option>";
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">存放数量</label>
                                    <div class="layui-input-block">
                                        <input type="number" name="book_num"
                                               placeholder="存放数量"  class="layui-input" disabled readonly
                                        value="<?php echo $row_book['book_num']?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">借阅数量</label>
                                    <div class="layui-input-block">
                                        <input type="number" name="borrow_num"
                                               placeholder="借阅数量"  class="layui-input" disabled readonly
                                               value="<?php echo $row['borrow_num']?>">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">是否通过</label>
                                    <div class="layui-input-block">
                                        <select name="state" lay-verify="required">
                                            <option value="">请选择</option>
                                            <option value="1">通过</option>
                                            <option value="2">不通过</option>
                                        </select>
                                    </div>
                                </div>
                                <!--  提交按钮-->
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <div style="margin-bottom: 20px;"></div>
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
</div>