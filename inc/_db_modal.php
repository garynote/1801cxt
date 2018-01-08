<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">诚信付出</h4>
            </div>
            <div class="modal-body" id="myModalContent">
                <div class="form-horizontal" data-validate="parsley">

                    <section class="panel panel-default">
                        <div class="panel-body">
                            <div class="alert alert-danger">
                            申请完成后，请等待系统随机分配受助对象
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label m-t-im">金额</label>
                                <div class="col-sm-3 m-t-im">
                                    <select onchange="change_pin_nums(this)" name="fc_amount" id="fc_amount" class="form-control" style="width:250px">
                                        <option value="1000">1000</option>
                                    <option value="2000">2000</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label m-t-im">排单币</label>
                                <div class="col-sm-6 m-t-im">
                                    <span class="form-control no-border">
                                        扣除 <label style="color:red;" id="lbTxt">1</label> 排单币
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label m-t-im">二级密码</label>
                                <div class="col-sm-6 m-t-im">
                                    <span class="form-control no-border">
                                        <input type="password" class="form-control" id="pass2" name="pass2"/>
                                    </span>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label m-t-im"></label>
                                <div class="col-sm-2 m-t-im">
                                    <input type="hidden" name="kou_pin_nums" id="kou_pin_nums" value="1"/>
                                    <input type="button" value="提交" id="btn_sub_fc" class="btn btn-info btn-s-xs" onclick="sub_fc()"/>
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