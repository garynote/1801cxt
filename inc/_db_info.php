<div class="panel panel-info" style="height:230px">

    <div class="panel-heading">
        <h3 class="panel-title"><i class="iconfont">&#xe602;</i> 我的账户<i class="iconfont pull-right">&#xe608;</i></h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered" style="width:100%;height:160px">
                <tbody>
                <tr>
                    <td class="success text-center text-bold" style="text-align:center;vertical-align:middle;font-size:18px;">直推人数</td>
                    <td class="warning" style="text-align:center;vertical-align:middle;"><? echo $user->direct; ?></td>
                    <td class="success text-center text-bold" style="text-align:center;vertical-align:middle;font-size:18px;">静态钱包</td>
                    <td class="warning" style="text-align:center;vertical-align:middle;">可用：<span class="text-danger text-bold"><? echo $user->wallet_p1; ?></span><br/>冻结：<span class="text-danger text-bold"><? echo $user->wallet_p2; ?></span></td>
                </tr>
                <tr>
                    <td class="success text-center text-bold" style="text-align:center;vertical-align:middle;font-size:18px;">可用排单币</td>
                    <td class="warning" style="text-align:center;vertical-align:middle;"><? echo $user->pin2; ?></td>
                    <td class="success text-center text-bold" style="text-align:center;vertical-align:middle;font-size:18px;">动态钱包</td>
                    <td class="warning" style="text-align:center;vertical-align:middle;">可用：<span class="text-danger text-bold"><? echo $user->wallet_a1; ?></span><br/>冻结：<span class="text-danger text-bold"><? echo $user->wallet_a2; ?></span></td>
                </tr>
                <tr>
                    <td class="success text-center text-bold" style="text-align:center;vertical-align:middle;font-size:18px;">可用激活码</td>
                    <td class="warning" style="text-align:center;vertical-align:middle;"><? echo $user->pin1; ?></td>
                   <!--  <td class="success text-center text-bold" style="text-align:center;vertical-align:middle;font-size:18px;">购物券钱包</td>
                    <td class="warning" style="text-align:center;vertical-align:middle;">可用：<span class="text-danger text-bold">0.00</span><br/>冻结：<span class="text-danger text-bold">0.00</span></td> -->
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>