<!-- 上传支付凭证 -->
<div class="modal fade" id="uppz_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel4"></h4>
      </div>
      <div class="modal-body" id="myModalContent4">

        <form class="form-horizontal" method="post" action="_action_upload.php" enctype="multipart/form-data">
        <input type="hidden" name="pzid" id="pzid"/>
        <input type="hidden" name="act" id="act" value='PH'/>
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">选择文件</label>
                        <div class="col-sm-8 m-t-im">
                            <input name="imgFile" id="upfile" type="file" class="filestyle" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        </div>
                    </div>
                    <div class="form-group m-b-xs">
                        <label class="col-sm-2 control-label m-t-im">支付方式</label>
                        <div class="col-sm-7 m-t-im">
                            <select name="zflx" class="form-control">
                              <option value="支付宝">支付宝</option>
                <option value="微信">微信</option>
                <option value="银行卡">银行卡</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label m-t-im"></label>
                        <div class="col-sm-8 m-t-im">
                          <input type="submit" value="上传" class="btn btn-info btn-s-xs" onclick="return sub_pz()"/>
                        </div>
                    </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>

      </div>
    </div>
  </div>
</div>
