<?
$buttons = 2;
$cols = ($buttons==2)? "6":"4";
?>
<div class="row"  style="margin:0px 10px 0 10px;">
    <div class="col-lg-<? echo $cols; ?>">
        <section class="panel panel-default">
            <footer class="panel-footer bg-danger text-center">
                <div class="row pull-out">
                    <div class="col-xs-12">
                        <a class="padder-v block" data-toggle="modal" href="#offerModal">
                            <span class="m-b-xs h3 block text-white" data-container="body" data-toggle="modal" data-target="#myModal" href="javascript:;" onclick="fc_help()">诚信付出</span>
                        </a>
                    </div>
                </div>
            </footer>
        </section>
    </div>

    <div class="col-lg-<? echo $cols; ?>">
        <section class="panel panel-default">
            <footer class="panel-footer bg-success text-center">
                <div class="row pull-out">
                    <div class="col-xs-12">
                        <a class="padder-v block" href="#acceptModal" data-toggle="modal">
                            <span class="m-b-xs h3 block text-white" data-container="body" data-toggle="modal" data-target="#myModal2" href="javascript:;" onclick="js_help()">诚信收获</span>
                        </a>
                    </div>
                </div>
            </footer>
        </section>
    </div>
<?
if ($buttons==3) {
?>
    <div class="col-lg-<? echo $cols; ?>">
        <section class="panel panel-default" style="margin-right:20px;">
            <footer class="panel-footer bg-success text-center">
                <div class="row pull-out">
                    <div class="col-xs-12">
                        <a class="padder-v block" data-container="body" data-toggle="modal" data-target="#myModal_kstd" href="javascript:;">
                            <span class="m-b-xs h3 block text-white">财富快车</span>
                        </a>
                    </div>
                </div>
            </footer>
        </section>
    </div>
<? } ?>
</div>

