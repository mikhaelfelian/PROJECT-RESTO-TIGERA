<div id="page-wrapper" style="margin-left: 0px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-beer"></i> Daftar Meja</h1>
        </div>
        
        <!-- /.col-lg-2 -->
        <?php if (!empty($meja)) { ?>
            <?php $no = 1; ?>
            <?php foreach ($meja as $meja) { ?>
                <div class="col-lg-3 col-md-5">
                    <div class="panel <?php echo ($meja->status == 0 ? 'panel-primary' : 'panel-red') ?>">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <?php echo br(2) ?>
                                    <i class="fa <?php echo ($meja->status == 0 ? 'fa-cutlery' : 'fa-user') ?> fa-5x"></i>
                                    <?php echo br(2) ?>
                                </div>
                                <div class="col-xs-9 text-center">
                                    <?php echo br(2) ?>
                                    <div class="huge"><strong><?php echo $no ?></strong></div>
                                    <?php echo br(2) ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-3">
                                    <?php if ($meja->status == 0) { ?>
                                        <a href="<?php echo base_url('pesan/meja.php?id='.$this->encrypt->encode_url($meja->id).'&no_meja='.$no) ?>">
                                            <div><button class="btn btn-primary">Pesan <i class="fa fa-arrow-right"></i></button></div>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('pesan/detail.php?id=' . $this->encrypt->encode_url($meja->id)) ?>">
                                            <div><button class="btn btn-danger">Terisi <i class="fa fa-remove"></i></button></div>
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php if ($meja->status == 0) { ?>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('pesan/detail.php?id='.$this->encrypt->encode_url($meja->id)) ?>">
                                            <div>Detail <i class="fa fa-arrow-right"></i></div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $no++ ?>
            <?php } ?>
        <?php } ?>
        
        <div class="col-lg-12">
            <pre>
                <?php print_r($this->session->all_userdata()) ?>
            </pre>
            
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>
