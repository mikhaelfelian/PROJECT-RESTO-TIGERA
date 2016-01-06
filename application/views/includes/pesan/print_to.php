<?php
/*
 * Session untuk ambil data cust dan meja
 * - Variabel $sesi_cust['nama']   => Memuat data nama cust;
 * - Variabel $sesi_cust['status'] => Memuat data status makan ditempan ato bungkus;
 */

$sesi_cust = $this->session->userdata('cust');


/*
 * Generate No. Nota
 */
$IDbaru = general::no_nota('tbl_orderlist', 'no_nota');

/* Selesai */
?>
<div id="page-wrapper" style="margin-left: 0px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header"><i class="fa fa-print"></i> Cetak Pesanan <?php echo $_GET['nota'] ?></h1>
        </div>
        <div class="col-lg-6 text-right">
            <h1 class="page-header">Meja No. <?php echo $this->encrypt->decode_url($_GET['id']); ?></h1>
        </div>
    </div>
    <div class="row">
        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i> Kembali</button></a><br/><br/>
        </div>

        <?php if (!empty($keranjang)) { ?>
            <?php foreach ($keranjang as $keranjang) { ?>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">                                
                                <div class="col-xs-9">
                                    <h2 class="panel-title"><i class="fa fa-cutlery"></i> Dapur</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                            $nota_det = crud::bacaDr('tbl_orderlist_det', 'no_nota', $keranjang->no_nota);
                            if (!empty($nota_det)) {
                                foreach ($nota_det as $nota_det) {
                                    $this->db->where('id_menu', $nota_det->id_menu);
                                    $mode = $this->db->get('tbl_menu')->row();
                                    if ($mode->id_kategori == 1) {
                                        ?>
                                        <br><span class="fa fa-coffee"></span><label><?php echo $nota_det->menu . ' x ' . $nota_det->jml . nbs(6) ?><br></label>
                                        <?php
                                    } else {
                                        ?>
                                        <br> <span class="fa fa-cutlery"></span> <label><?php echo $nota_det->menu . ' x ' . $nota_det->jml . nbs(6) ?></label>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">                                
                                <div class="col-xs-9">
                                    <h2 class="panel-title"><i class="fa fa-cc"></i> Kasir</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <script type="text/javascript">
                                function PrintIframe()
                                {
                                    window.frames["cetak"].focus();
                                    window.frames["cetak"].print();
                                }
                            </script>
                            <iframe name="cetak" width="380px" height="550px" onclick="PrintIframe();" src="<?php echo base_url('pesan/cetak.php?module=print_termal&id=' . $_GET['id'] . '&nota=' . $_GET['nota'] . '&totalamount=' . $_GET['totalamount']) ?>">                                
                            </iframe>
                            <?php echo br(2) ?>
                            <button class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">                                
                                <div class="col-xs-9">
                                    <h2 class="panel-title"><i class="fa fa-check-circle"></i> Checker</h2>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                            $nota_det = crud::bacaDr('tbl_orderlist_det', 'no_nota', $keranjang->no_nota);
                            if (!empty($nota_det)) {
                                foreach ($nota_det as $nota_det) {
                                    $this->db->where('id_menu', $nota_det->id_menu);
                                    $mode = $this->db->get('tbl_menu')->row();
                                    if ($mode->id_kategori == 1) {
                                        ?>
                                        <br><span class="fa fa-coffee"></span><label><?php echo $nota_det->menu . nbs(6) ?><br></label>
                                        <?php
                                    } else {
                                        ?>
                                        <br> <span class="fa fa-cutlery"></span> <label><?php echo $nota_det->menu . nbs(6) ?></label>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="col-lg-12">
        <pre>
            <?php print_r($_SERVER) ?>
            <?php // print_r($this->session->all_userdata()) ?>
        </pre>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>