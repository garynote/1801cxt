<!-- 举报并上传举报图片 -->
<div class="modal fade" id="report_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_report">举报</h4>
            </div>
            <div class="modal-body" id="myModalContent_report">
                <form class="form-horizontal" method="post" action="/index.php?con=ucenter&act=report_do" enctype="multipart/form-data">

                    <input type="hidden" name="pp_id" id="pp_id"/>
                    <input type="hidden" name="report_user_id" id="report_user_id" value="79"/>

                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">选择图片</label>
                        <div class="col-sm-8 m-t-im">
                            <input name="report_img" id="report_img" type="file" class="filestyle"
                                   data-classButton="btn btn-default"
                                   data-classInput="form-control inline v-middle input-s">(默认为打款用户上传的图片)
                        </div>
                    </div>

                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">备注：</label>
                        <div class="col-sm-7 m-t-im">
                            <textarea class="form-control" name="desc" id="desc" style="resize:none;"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-8 m-t-im">
                            <input type="submit" value="提交" class="btn btn-info btn-s-xs" onclick="return sub_report()"/>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <!--
                <button type="button" class="btn btn-primary">Save changes</button>
                -->
            </div>
        </div>
    </div>
</div>
