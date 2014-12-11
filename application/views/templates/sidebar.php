<!-- sidebar 部分开始 -->
<ul class="sidebar">
    <li class="sidebar-title">菜&nbsp;&nbsp;单</li>
    <li><a href="price/upload/">上传表格</a></li>
    <li><a href="price/init_screen/">初次筛选</a></li>
    <li><a href="price/control/">价格管控</a></li>
    <li><a href="graph/init_first">查看报表</a></li>
    <?php if($this->session->userdata('groupID') == 0): ?>
        <li><a href="management/user/">用户管理</a></li>
        <li><a href="management/project/">项目管理</a></li>
    <?php endif; ?>
<!--        <li><a href="price/inputTarget/">录入下周目标</a></li>-->
<!--        <li><a href="price/inputComplete">录入今日完成</a></li>-->
</ul>
<!-- sidebar 部分结束 -->
<!-- main 部分开始 -->
<div class="main container-fluid bgwh">
