<div id="page-wrapper" style="background: #fff; margin-left: 0px;">
    <div class="row">
        <div class="col-lg-12">
            <br/>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php if (!empty($meja)) { ?>
                    <?php $no_meja = 1 ?>
                    <?php foreach ($meja as $meja) { ?>
                        <div class="col-lg-3">
                            <div class="panel <?php echo ($meja->status == '1' ? 'panel-danger' : 'panel-primary') ?>">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <?php echo ($meja->status == '1' ? '<i class="fa fa-user fa-5x"></i>' : '<i class="fa fa-cutlery fa-5x"></i>') ?>
                                        </div>
                                        <div class="col-xs-9 text-center">
                                            <div class="huge"><b><?php echo $no_meja ?></b></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <span class="pull-left"><button class="btn <?php echo ($meja->status == '1' ? 'btn-danger' : 'btn-primary') ?>"><?php echo ($meja->status == '1' ? '<b>Terisi</b>' : '<b>Pesan</b>') ?>&nbsp;<?php echo ($meja->status == '1' ? '<i class="fa fa-remove"></i>' : '<i class="fa fa-arrow-circle-right"></i>') ?></button></span>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <?php $no_meja++ ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>