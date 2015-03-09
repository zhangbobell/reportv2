<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-1">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">

                </div>
            </div>
        </div>
        <div class="col-lg-10 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                    <a href="mailbox.html" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                </div>
                <h2>
                    追灿邮件
                </h2>
            </div>
            <div class="mail-box">


                <div class="mail-body">

                    <form class="form-horizontal" method="get">
                        <div class="form-group"><label class="col-sm-2 control-label">To:</label>

                            <div class="col-sm-10"><input type="text" class="form-control" value="admin@e-corp.cn"></div>
                        </div>
                        <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>

                            <div class="col-sm-10"><input type="text" class="form-control" value=<?php echo $sendfor ?>></div>
                        </div>
                    </form>

                </div>

                <div class="mail-text h-300">
                    <div class="summernote">
                        <?php if($send_applymail == true) { ?>
                            <pre>
                            <h4><strong>管理员你好!</strong></h4>  我申请试用<?php echo $mailtitle ?>的试用，以下是我的相关信息：
                        <strong>企业信息：</strong>
                                    企业名称：                        成立时间：
                                    所属行业：                        主营产品：
                        <strong>申请人信息：</strong>
                                    申请人 ：                         职位   ：
                                    手机号 ：                         邮箱   ：
                        <strong>申请理由：</strong>
                        </pre>
                        <?php } else {?>
                            <pre>
                                <h4><strong>管理员你好!</strong></h4>  我在使用你们公司的产品时，遇到以下问题：
            <strong>1.</strong>
            <strong>2.</strong>
            <strong>3.</strong>
            <strong>4.</strong>
  希望能尽快修复。
                            </pre>
                        <?php } ?>
                        <br/>
                        <br/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mail-body text-right tooltip-demo">
                    <a href="mailbox.html" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</a>
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Discard email"><i class="fa fa-times"></i> Discard</a>
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to draft folder"><i class="fa fa-pencil"></i> Draft</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>