<!-- 获得利息标准 -->
<div class="modal fade" id="myModal_hxbz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title">获息标准</h4>
      </div>
      <div class="modal-body">
          <form id="form_hxbz" method="post" action="/index.php?con=ucenter&act=hxbz">
          <input type="radio" checked="checked" name="hxbz" value="1"/>
          A:72-96小时内匹配回款,比例:10%<br><br>
          <input type="radio" name="hxbz" value="2"/>
          B:96-120小时内匹配回款,比例:13%<br><br>
          <input type="radio" name="hxbz" value="3"/>
          C:120-144小时内匹配回款,比例:16%<br><br>
          <input type="radio" name="hxbz" value="4"/>
          D:144-148小时内匹配回款,比例:19%<br><br>
          <input type="radio" name="hxbz" value="5"/>
          E:148-172小时内匹配回款,比例:22%<br><br>
          <!--
          <select name="hxbz">
            <option value="1">A:72-96小时内匹配回款,比例:10%</option>
            <option value="2">B:96-120小时内匹配回款,比例:13%</option>
            <option value="3">C:120-144小时内匹配回款,比例:16%</option>
            <option value="4">D:144-148小时内匹配回款,比例:19%</option>
            <option value="5">E:148-172小时内匹配回款,比例:22%</option>
          </select>
          -->
          <input type="hidden" name="user_id" value="79"/>
          <input type="hidden" name="fc_id" id="fc_id"/>
          &nbsp;&nbsp;
          <input type="button" class="btn btn-info" value="提交" id="btn_hxbz"/>
            </form>
        </span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div>
  </div>
</div>

