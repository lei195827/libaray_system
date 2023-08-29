<?php
include ("head.php");
include ("foot.php");
limits('图书管理');
?>
    <div class="layui-body">
        <div style="padding: 15px;">
        <!-- 底部固定区域 -->
        <h2>图书管理</h2>
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li><a href="book_list.php" >图书列表</a></li>
                    <li  class="layui-this"><a href="book_new.php">新增图书</a></li>
<!--                    <li><a href="book_damage.php" >损坏管理</a></li>-->
                </ul>
            </div>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div layui-row>
                        <div class="layui-row-md8">
                            <form class="layui-form" action="book_save.php" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">图书名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="book_name" lay-verify="required"
                                               placeholder="输入图书名称"  class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">图书类型</label>
                                    <div class="layui-input-block">
                                       <select name="book_assort" lay-verify="required">
                                           <option value="">请选择类型</option>
                                           <?php
                                           $sql="select * from assort order by id";
                                           $result=$conn->query($sql);
                                           while($row=$result->fetch_assoc()){
                                               echo "<option value=\"".$row['assort_name']."\">".$row['assort_name']
                                               ."</option>";
                                           }
                                           ?>
                                       </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">存放位置</label>
                                    <div class="layui-input-block">
                                        <select name="book_position" lay-verify="required">
                                            <option value="">请选择存放位置</option>
                                            <?php
                                            $sql="select * from position_other order by id";
                                            $result=$conn->query($sql);
                                            while($row=$result->fetch_assoc()){
                                                echo "<option value=\"".$row['position_name']."\">".$row['position_name']
                                                    ."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <label class="layui-form-label">存放数量</label>
                                <div class="layui-input-block">
                                    <input type="number" name="book_num"
                                           placeholder="存放数量"  class="layui-input">
                                </div>
                        </div>
                                <!--  提交按钮-->
                                <div style="padding: 10px"></div>
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