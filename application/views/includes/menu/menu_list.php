<div id="page-wrapper" style="margin-left: 0px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header"><i class="fa fa-list"></i> Daftar Menu</h1>
        </div>
        <div class="col-lg-6 text-right">
            <h1 class="page-header">Meja No. <?php echo $this->encrypt->decode_url($_GET['id']) . ' (' . $this->cart->total_items() . ' Pesanan)'; ?></h1>
        </div>
    </div>
    <div class="row">
        <?php $cart = $this->cart->contents(); ?>
        <!-- /.col-lg-12 -->
        <div class="col-lg-3">
            <a href="<?php echo base_url('pesan/meja_batal.php?id=' . $_GET['id']) ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Batal</button></a><br/><br/>
        </div>
        <?php echo form_open('front/cari_menu.php') ?>
        <div class="col-lg-5 text-center">
            <?php echo form_input(array('id'=>'cari','name'=>'cari','class'=>'form-control','placeholder'=>'Pencarian ...')) ?>
        </div>
        <div class="col-lg-1 text-left">
            <button class="btn btn-primary"><i class="fa fa-search-minus"></i> Cari</button>
        </div>
        <?php echo form_close() ?>
        <div class="col-lg-3 text-right">
            <?php if (!empty($cart)) { ?>
                <a href="<?php echo base_url('pesan/checkout.php?id=' . $_GET['id'] . '&no_meja=' . $_GET['no_meja']) ?>"><button class="btn btn-primary">Lanjut <i class="fa fa-fw fa-arrow-right"></i></button></a><br/><br/>
            <?php } else { ?>
                <button class="btn btn-default" onclick="alert('Silahkan pesan minimal 1 menu.')">Lanjut <i class="fa fa-fw fa-arrow-right"></i></button><br/><br/>
            <?php } ?>
        </div>

        <div class="col-lg-12">
            <?php echo $this->session->flashdata('transaksi') ?>
        </div>

        <?php
        if (!empty($menu_list)) {
            $no = 1;
            foreach ($menu_list as $menu) {
                ?>
                <!-- JQueri UI Form <?php echo $no; ?>-->
                <script src="<?php echo base_url() ?>assets/ui/jquery-2.1.4.min.js"></script>
                <!--<script src="<?php echo base_url() ?>assets/ui/jquery.js"></script>-->
                <script src="<?php echo base_url() ?>assets/ui/jquery-ui.js"></script>
                <script src="<?php echo base_url() ?>assets/ui/autonumeric.js"></script>
                <link href="<?php echo base_url() ?>assets/ui/jquery-ui.min.css" rel="stylesheet">
                <script type="text/javascript">
                    var s = $.noConflict();
                    s(function() {
                        //                s('#tgl').datepicker({'dateFormat': 'yy-mm-dd'});

                        s("#price<?php echo $no; ?>").autoNumeric({aSep: '.', aDec: ',', aPad: false});

                        s("#qty<?php echo $no; ?>").keydown(function(e) {
                            // Allow: backspace, delete, tab, escape, enter and .
                            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                                    // Allow: Ctrl+A, Command+A
                                            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                                            // Allow: home, end, left, right, down, up
                                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                                        // let it happen, don't do anything
                                        return;
                                    }
                                    // Ensure that it is a number and stop the keypress
                                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                        e.preventDefault();
                                    }
                                });
                    });
                </script>
                <!--JQuery UI-->

                <?php echo form_open('pesan/temp_pesan_menu.php','id="prod'.$no.'"') ?>
                <?php echo form_hidden('id_meja', $_GET['id']) ?>
                <?php echo form_hidden('no_meja', $_GET['no_meja']) ?>
                <?php echo form_hidden('id_menu', $menu->id_menu) ?>
                <?php echo form_hidden('kode', $menu->kode) ?>
                <?php echo form_hidden('nama', $menu->menu) ?>
                <?php echo form_hidden('harga', $menu->harga) ?>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">                                
                                <div class="col-xs-9">
                                    <h2 class="panel-title"><?php echo $no . '. ' . ucwords($menu->menu) ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-3">
                                <?php if (!empty($menu->file)) { ?>
                                    <img src="<?php echo base_url('assets/gbr/' . $menu->file) ?>" class="img-circle" style="width: 100px; height: 100px;">
                                <?php } else { ?>
                                    <i class="fa fa-cutlery fa-5x"></i>
                                <?php } ?>
                            </div>
                            <div class="col-xs-9 text-right">
                                <strong><?php echo ($menu->harga / 1000) ?>K</strong>
                                <p class="text-muted"><?php echo $menu->ket ?></p>
                            </div>
                        </div>
                        <div class="panel-body">
                            <p class="text-gray"><strong>Keterangan :</strong></p>
                            <p class="text-gray">
                                <?php echo form_textarea(array('name' => 'ket', 'rows' => '5', 'placeholder' => 'Silahkan masukan keterangan. Misal : Nasi goreng tidak pedas', 'class' => 'form-control')) ?>
                            </p>
                            <p class="text-gray"><label>Harga Tambahan :</label></p>
                            <p class="text-gray">
                                <?php echo form_input(array('id' => 'price' . $no, 'name' => 'tambahan', 'placeholder' => 'harga tambahan', 'class' => 'form-control')) ?>
                            </p>
                        </div>
                        <div class="panel-footer">
                            <div class="row">                                
                                <div class="col-xs-3">
                                    <?php echo form_input(array('id' => 'qty' . $no, 'name' => 'qty', 'value' => '1', 'class' => 'form-control')) ?>
                                </div>
                                <div class="col-xs-9 text-left">
                                    <button class="btn btn-default"><i class="fa fa-shopping-cart"></i> Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
                <?php
                $no++;
            }
        }
        ?>
    </div>

    <div class="col-lg-12">
        <pre>
            <?php print_r($this->session->all_userdata()) ?>
        </pre>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>