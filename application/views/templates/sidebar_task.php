<!-- sidebar 部分开始 -->
<ul class="sidebar">
    <li class="sidebar-title">任务菜单</li>
    <li><a href="task/my_task">我的任务</a></li>
    <li><a href="task/assign">指派任务</a></li>
    <?php if($this->session->userdata('groupID') == 0): ?>
        <li><a href="price/control">乱价模块</a></li>
        <li><a href="graph/init_first">报表模块</a></li>
    <?php endif; ?>

    <!--        <li><a href="price/inputTarget/">录入下周目标</a></li>-->
    <!--        <li><a href="price/inputComplete">录入今日完成</a></li>-->
</ul>
<!-- sidebar 部分结束 -->
<!-- main 部分开始 -->
<div class="main container-fluid bgwh">