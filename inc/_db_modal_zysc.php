<!-- 自由市场 -->
<div class="modal fade" id="myModal_zysc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">自由市场</h4>
            </div>
            <div class="modal-body" id="myModalContent">
                <div class="form-horizontal" data-validate="parsley">
                    <section class="panel panel-default">

                        <div class="panel-body">

                            <div class="alert alert-danger">

                             申请完成后，请您耐心等待系统随机分配受助对象！
                            </div>

                            <div class="form-group">

                                <label class="col-sm-2 control-label m-t-im">金额</label>
                                <div class="col-sm-3 m-t-im">

                                    <select name="zysc_amount" id="zysc_amount" id="zysc_amount" class="form-control" style="width:250px">
                                      <option value="10000">10000</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label m-t-im">&nbsp;&nbsp;</label>
                                <div class="col-sm-6 m-t-im">
                                    <span class="form-control no-border">
                                    扣除 <label style="color:red;" id="lbTxt_zysc">1</label> 排单币</span>
                                </div>
                            </div>

              <!--
                            <div class="form-group text-danger m-b-xs">
                                <label class="col-sm-2 control-label m-t-im"></label>
                                <div class="col-sm-10 m-t-im">提示：您已充分了解投资风险</div>
                            </div>
                            -->
                            <div class="form-group">
                                <label class="col-sm-2 control-label m-t-im"></label>
                                <div class="col-sm-2 m-t-im">
                                  <input type="hidden" name="kou_zysc_pin_nums" id="kou_zysc_pin_nums" value="1"/>
                                    <input type="button" id="btn_submit_zysc" value="提交" class="btn btn-info btn-s-xs"
                                           onclick="sub_zysc()"/>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
