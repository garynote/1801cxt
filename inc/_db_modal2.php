
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel2">诚信收获</h4>
      </div>
      <div class="modal-body" id="myModalContent2">

        <div class="form-horizontal" data-validate="parsley">
            <section class="panel panel-default">
                <div class="panel-body">
                    <div class="alert alert-danger">
                        申请完成后，请等待匹配成功后付款通知<br>温馨提示：静态钱包每天只能接受一次，请认真核对金额后再进行操作！
      <!--
                        接受帮助静态钱包金额为￥500~8000 动态钱包￥500~1000
            -->
                    </div>
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">选择钱包</label>
                        <div class="col-sm-9 m-t-im">
                            <div class="radio pull-left m-r-lg">
                                <label>
                                    <input type="radio" name="lx" value="1" checked>
                                    静态钱包(<span class="text-danger">0.00</span>)
                                </label>
                            </div>
                            <div class="radio pull-left">
                                <label>
                                    <input type="radio" name="lx" value="2">
                                    动态钱包(<span class="text-danger">0.00</span>)
                                </label>
                            </div>
                            <!--
                            <div class="radio pull-right">
                                <label>
                                    <input type="radio" name="lx" value="3">
                                    经理钱包(<span class="text-danger">0.00</span>)
                                </label>
                            </div>
                            -->
                        </div>
                    </div>
                    <!----end form-group--->
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">受助金额</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="text" id="js_amount" name="js_amount" class="form-control parsley-validated" data-required="true" placeholder="金额需为100的倍数">
                        </div>
                    </div>
                    <div class="form-group  m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">二级密码</label>
                        <div class="col-sm-6 m-t-im">
                            <input type="password" name="password" id="password" class="form-control parsley-validated" data-required="true">
                        </div>
                    </div>
                    <!--
                    <div class="form-group text-danger m-b-xs">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-10 m-t-im">
                          提示：1、您已充分了解投资风险 &nbsp;&nbsp;2、推荐钱包每天只能进行1次接受帮助&nbsp;&nbsp; 3、二级密码默认和登录密码相同，您可以通过“账号设置”->“修改密码”，修改二级密码
                        </div>
                    </div>
                    -->
                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-2 m-t-im">
                            <input type="button" value="提交" id="btn_sub_js" class="btn btn-info btn-s-xs" onclick="sub_js()"/>
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

