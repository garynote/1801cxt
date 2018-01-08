<script type="text/javascript">
function show_fc_detail(fc_je,real_name,close_time,sy_time,zhifubao, weixin,bank, bankkh)
{
  $("#myModalLabel3").html("支付详情1");

  //$("#close_time").html(sy_time);

  setInterval(function(){

    var EndTime= new Date(close_time); //截止时间 前端路上 http://www.51xuediannao.com/qd63/
         var NowTime = new Date();
         var t =EndTime.getTime() - NowTime.getTime();
         var d=Math.floor(t/1000/60/60/24);
         var h=Math.floor(t/1000/60/60%24);
         var m=Math.floor(t/1000/60%60);
         var s=Math.floor(t/1000%60);
           var str = '';
           str += d + " 天 ";
           str += h + " 时 ";
           str += m + " 分 ";
           str += s + " 秒 ";
      $("#close_time").html(str);
  },1000);


  $("#real_name").html("真实姓名："+real_name);
  $("#pbank").html("开户行："+bank);
  $("#pbankkh").html("银行卡号："+bankkh);
  $("#fc_je").html("打款金额：<b style='color:red;'>"+fc_je+"</b>");
  if(zhifubao != '')
  {
    $("#pzhifubao").html("支付宝："+zhifubao);
  }
  if(weixin != '')
  {
    $("#pweixin").html("微信："+weixin);
  }

  $("#myModal3").modal();

}


function show_pz( pic )
{
  $("#myModalLabel30").html("查看支付凭证");
  $("#zhifu_img").attr('src', pic);
  $("#myModal_zhifu").modal();

}


function sub_js()
{
  var js_amount = parseInt($("#js_amount").val());
  var lx = parseInt( $("input[name='lx']:checked").val() );

  var password = $("#password").val();

  if(lx == 1)
  {
    if(js_amount <100 || js_amount % 100 != 0 || isNaN(js_amount))
    {
      alert("金额最少为100且为100的倍数");
      return false;
    }
  }
  else if(lx == 2)
  {
    if(js_amount < 300 || js_amount % 100 != 0 || js_amount > 3000)
    {
      alert("金额须为300-3000且为100的倍数");
      return false;
    }

  }
  else if(lx == 3)
  {
    if(js_amount <5000 || js_amount % 5000 != 0)
    {
      alert("受助金额必须为5000的倍数");
      return false;
    }

    var group_id = 1;
    if( group_id == 2)
    {
      if(js_amount > 5000)
      {
        alert("当前受助金额最高为5000");
        return false;
      }
    }
    else if( group_id == 3 )
    {
      if(js_amount > 15000)
      {
        alert("当前受助金额最高为15000");
        return false;
      }
    }
    else if( group_id == 4 )
    {
      if(js_amount > 40000)
      {
        alert("当前受助金额最高为40000");
        return false;
      }
    }
  }

  if(password == '')
  {
    alert("二级密码不能为空");
    return false;
  }

  $("#btn_sub_js").prop("disabled", "disabled");

  $.post("/index.php?con=ucenter&act=js",{password:password,js_amount:js_amount,lx:lx},function(result){
    var result = eval("("+result+")");
    if(result['status'] == 'success')
    {
      alert(result['msg']);
      document.location.href = document.location.href;
    }
    else
    {
      alert(result['msg']);
      document.location.href = document.location.href;
    }
    });

}

//提交“提供帮助”
function sub_fc()
{
  var pass2 = $.trim($("#pass2").val());
  if(pass2 == '')
  {
    alert('二级密码不能为空');
    return;
  }
  //被扣的诚信金的数量
  var kou_pin_nums = $("#kou_pin_nums").val();

  //提供帮助的金额
  var fc_amount = $("#fc_amount").val();

  var act = 'PH';
  $("#btn_sub_fc").prop('disabled', 'disabled');
  $.post("_action_ph.php",{act:act,pass2:pass2,PinQty:kou_pin_nums,HelpAmount:fc_amount},function(result){
    if(result['status'] == 'success')
    {
      alert(result['msg']);
      document.location.href = document.location.href;
    }
    else
    {
      alert(result['msg']);
    }
  },"json");
}


function sub_kstd()
{
    //提供帮助的金额
    var kstd_amount = $("#kstd_amount").val();
  var kou_kstd_pin_nums = $("#kou_kstd_pin_nums").val();

    $("#btn_submit_kstd").attr("disabled", "1");
  var kou_pin_nums = $("#kou_kstd_pin_nums").val();

    $.post("/index.php?con=ucenter&act=kstd", {kou_kstd_pin_nums: kou_kstd_pin_nums, kstd_amount: kstd_amount}, function (result) {

        var result = eval("(" + result + ")");

        if (result['status'] == 'success') {
            alert(result['msg']);
            document.location.href = document.location.href;
        }
        else
        {
            alert(result['msg']);
            document.location.href = document.location.href;
        }
    });
}



/**
 * 自由市场
 */
function sub_zysc()
{
    //提供帮助的金额
    var zysc_amount = $("#zysc_amount").val();
  var kou_zysc_pin_nums = $("#kou_zysc_pin_nums").val();

    $("#btn_submit_zysc").attr("disabled", "1");
  //var kou_pin_nums = $("#kou_zysc_pin_nums").val();

    $.post("/index.php?con=ucenter&act=zysc", {kou_zysc_pin_nums: kou_zysc_pin_nums, zysc_amount: zysc_amount}, function (result) {

        var result = eval("(" + result + ")");

        if (result['status'] == 'success') {
            alert(result['msg']);
            document.location.href = document.location.href;
        }
        else
        {
            alert(result['msg']);
            document.location.href = document.location.href;
        }
    });
}



function fc_help()
{
  $("#myModalLabel").html("诚信付出");
}
function js_help()
{
  $("#myModalLabel2").html("诚信收获");
}
function show_upload_pz(pzid)
{
  $("#myModalLabel4").html("上传支付凭证");
  $("#pzid").val(pzid);
}
function sub_sure(obj)
{
  if(confirm("确定要执行此操作？"))
  {
    var fcuid = $(obj).attr("fcuid");
    var ddid  = $(obj).attr("ddid");
    //alert(fcuid+" "+ddid);return;
    $("#btn_sub_sure").attr("disabled", true);
    $.post("/index.php?con=ucenter&act=pl_save",{fcuid:fcuid,ddid:ddid},function(result){
      if(result['status']=='success')
      {
        alert('操作成功');
        document.location.href = document.location.href;
      }
      else
      {
        alert("操作失败");
        document.location.href = document.location.href;
      }
    },'json');


  }
  else
  {
    return false;
  }
}
function sub_pz()
{
  var imgFile = $("#upfile").val();
  if(imgFile == '')
  {
    alert("支付凭证不能为空");
    return false;
  }

}


function shelp_do()
{
      var h = parseInt($("#shelp").height())+parseInt($("#shelp").height())-50;
    $("#div_scroll").attr("style","height:"+h+"px");
  }

  function change_pin_nums(obj)
  {
    //var z = obj.value/1000;
    var v = parseInt(obj.value);
    if(v == 1000 || v == 2000)
    {
      $("#lbTxt").text( 1 );
      $("#kou_pin_nums").val( 1 );
    }
    if(v == 3000 || v == 4000)
    {
      $("#lbTxt").text( 2 );
      $("#kou_pin_nums").val( 2 );
    }
    if(v == 5000)
    {
      $("#lbTxt").text( 3 );
      $("#kou_pin_nums").val( 3 );
    }
  }

  $(function(){
          var h = parseInt($("#help").height())+parseInt($("#help").height())-50;
      $("#div_scroll").attr("style","height:"+h+"px");



    $("[name='hid_last_sure_time']").each(function(){
      var last_sure_time = $(this).val();
      var obj = $(this);
      setInterval(function(){

        var EndTime= new Date(last_sure_time); //截止时间 前端路上 http://www.51xuediannao.com/qd63/
             var NowTime = new Date();
             var t =EndTime.getTime() - NowTime.getTime();
             var d=Math.floor(t/1000/60/60/24);
             var h=Math.floor(t/1000/60/60%24);
             var m=Math.floor(t/1000/60%60);
             var s=Math.floor(t/1000%60);
               var str = '';
               str += d + " 天 ";
               str += h + " 时 ";
               str += m + " 分 ";
               str += s + " 秒 ";
          //$("#close_time").html(str);
          obj.next("b").text(str);
      },1000);
    });




    var kstd_amount = parseInt($("#kstd_amount option:first").val());

    var fc_amount = parseInt($("#fc_amount option:first").val());

    if(fc_amount == 3000 || fc_amount == 5000)
    {
      $("#lbTxt").text( 1 );
      $("#kou_pin_nums").val( 1 );
    }

    if(fc_amount == 10000 || fc_amount == 15000 || fc_amount == 20000)
    {
      $("#lbTxt").text( 2 );
      $("#kou_pin_nums").val( 2 );
    }

    if(kstd_amount == 5000)
    {
      $("#lbTxt_kstd").text( 3 );
      $("#kou_kstd_pin_nums").val( 3 );
    }
    else
    {
      $("#lbTxt_kstd").text( 2 );
      $("#kou_kstd_pin_nums").val( 2 );
    }
    /*
    if(kstd_amount == 10000 || kstd_amount == 15000 || kstd_amount == 20000)
    {
      $("#lbTxt_kstd").text( 2 );
      $("#kou_kstd_pin_nums").val( 2 );
    }
    */


    $("input[name='lx']").click(function(){
      var val = parseInt($(this).val());
      if(val == 1)
      {
        $("#js_amount").attr("placeholder","金额为100的倍数");
      }
      else if(val == 2)
      {
        $("#js_amount").attr("placeholder","金额最低为300,且为100的倍数");
      }
      else if(val == 3)
      {
        $("#js_amount").attr("placeholder","金额需为5000的倍数");
      }
    });

  });

  function change_kstd_pin_nums(obj)
  {
    var z = parseInt(obj.value);
    /*
    $("#lbTxt_kstd").text( z );
    $("#kou_kstd_pin_nums").val( z );
    */

    if(z == 5000)
    {
      $("#lbTxt_kstd").text( 3 );
      $("#kou_kstd_pin_nums").val( 3 );
    }
    else
    {
      $("#lbTxt_kstd").text( 2 );
      $("#kou_kstd_pin_nums").val( 2 );
    }
    /*
    if(z == 10000 || z == 15000 || z == 20000)
    {
      $("#lbTxt_kstd").text( 2 );
      $("#kou_kstd_pin_nums").val( 2 );
    }
    */

  }


  function show_article(arg,id)
  {
    $("#myModalLabel_article").html(arg);

    $.post("/index.php?con=ucenter&act=getArticleById",{id:id},function(result){
      $("#myModalContent_article").html(result);
      });
  }

  function qx_fc(id)
  {
    if(!confirm("确定要执行此操作？"))
    {
      return false;
    }
    $.post("/index.php?con=ucenter&act=qx_fc",{id:id},function(result){
      if(result == 'success')
      {
        alert("操作成功");
      }
      else
      {
        alert("操作失败");
      }
      document.location.href = document.location.href;

      },"text");
  }

  $(document).ready(function(){
    $("#liHelp").click(function(){

      $("#help").toggle();
      });

    $("#liShelp").click(function(){
      $("#shelp").toggle();
      });
    $("#btn_hxbz").click(function(){
      var confirm_str = "确定要执行此操作？";
      if(confirm(confirm_str))
      {
        var hxbz_type = $("input[name='hxbz']:checked").val();
        var fc_id = $("#fc_id").val();
        $(this).attr("disabled","0");
        $.post("/index.php?con=ucenter&act=check_hxbz",{fc_id:fc_id,hxbz_type:hxbz_type},function(result){
          if(result == 'success')
          {
            $("#form_hxbz").submit();
          }
          else
          {
            $("#btn_hxbz").removeAttr("disabled");
            //alert("操作失败");
            alert(result);

          }
          //document.location.href = document.location.href;

          },"text");
      }
      //$("#form_hxbz").submit();
    });

    //$("#myModal_cj").modal();

    });


  function rec( pp_id )
  {
    $("#pp_id").val( pp_id );
  }
  function show_hxbz(fc_id)
  {
    //$("#myModalLabel30").html("查看支付凭证");
    //$("#zhifu_img").attr('src', pic);
    $("#fc_id").val(fc_id);
    $("#myModal_hxbz").modal();

  }


  function ss(arg,id)
  {
    $("#myModalLabel_article").html(arg);

    $.post("_getArticle.php",{id:id},function(result){
      $("#myModalContent_article").html(result);
      });
  }
</script>
