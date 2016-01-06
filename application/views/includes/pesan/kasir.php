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
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Transaksi Pembayaran</h1>
        </div>
    </div>

    <!-- /.col-lg-12 -->
    <div class="row">        
        <div class="col-lg-6">
            <a href="<?php echo base_url() ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i> Kembali</button></a><br/><br/>
        </div>
    </div>

    <!-- JQueri UI -->
    <script src="<?php echo base_url() ?>assets/ui/jquery-2.1.4.min.js"></script>
    <!--<script src="<?php echo base_url() ?>assets/ui/jquery.js"></script>-->
    <script src="<?php echo base_url() ?>assets/ui/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>assets/ui/autonumeric.js"></script>
    <link href="<?php echo base_url() ?>assets/ui/jquery-ui.min.css" rel="stylesheet">
    <script type="text/javascript">
        var s = $.noConflict();
        s(function() {

            s("#bayar").autoNumeric({aSep: '.', aDec: ',', aPad: false});

        });
    </script>
    <!--JQuery UI-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Transaksi Pembayaran</h2>
                </div>
                <div class="panel-body">
                    <?php echo form_open('pesan/simpan_trans_final.php'); ?>
                    <?php echo form_hidden('no_meja', general::enkrip($finalize->no_meja)); ?>
                    <?php echo form_hidden('no_nota', general::enkrip($finalize->no_nota)); ?>
                    <?php echo form_hidden('jml_gtotal', $finalize->jml_gtotal); ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <th colspan="7" style="background-color: #b7b9b6; border-right:  1px solid #b7b9b6;"><i><?php echo $finalize->no_nota; ?></i></th>
                                    </tr>
                                    <tr>
                                        <th style="border-left: 1px solid #b7b9b6;">Nama Customer</th>
                                        <th>:</th>
                                        <td><?php echo $finalize->nama; ?></td>
                                        <td>&nbsp;</td>
                                        <th>Tanggal</th>
                                        <th>:</th>
                                        <td style="border-right: 1px solid #b7b9b6;"><?php echo $this->tanggalan->tgl_indo($finalize->tgl); ?></td>
                                    </tr>
                                    <tr>
                                        <th style="border-left: 1px solid #b7b9b6;">Total</th>
                                        <th>:</th>
                                        <td>Rp. <?php echo number_format($finalize->jml_bayar, 0, ',', '.'); ?></td>
                                        <td>&nbsp;</td>
                                        <th>PPN</th>
                                        <th>:</th>
                                        <td style="border-right: 1px solid #b7b9b6;">Rp. <?php echo number_format(general::tax($finalize->jml_bayar), 0, ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <th style="border-left: 1px solid #b7b9b6; vertical-align: middle;">Grand Total</th>
                                        <th style="vertical-align: middle;">:</th>
                                        <td style="vertical-align: middle;">Rp. <?php echo number_format(general::tax($finalize->jml_bayar) + $finalize->jml_bayar, 0, ',', '.'); ?></td>
                                        <td>&nbsp;</td>
                                        <th style="vertical-align: middle;">Bayar</th>
                                        <th style="vertical-align: middle;">:</th>
                                        <td style="border-right: 1px solid #b7b9b6; vertical-align: middle;"><?php echo form_input(array('id' => 'bayar', 'name' => 'cash', 'class' => 'form-control')) ?></td>
                                    </tr>
                                    <tr>
                                        <th style="border-left: 1px solid #b7b9b6; border-bottom: 1px solid #b7b9b6;"></th>
                                        <th style="border-bottom: 1px solid #b7b9b6;"></th>
                                        <td style="border-bottom: 1px solid #b7b9b6;"></td>
                                        <td style="border-bottom: 1px solid #b7b9b6;"></td>
                                        <th style="border-bottom: 1px solid #b7b9b6;">Kembali</th>
                                        <th style="border-bottom: 1px solid #b7b9b6;">:</th>
                                        <td style="border-right: 1px solid #b7b9b6; border-bottom: 1px solid #b7b9b6;">gj</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th class="text-center"><label>No.</label></th>
                                        <th class="text-center"><label>Menu</label></th>
                                        <th class="text-center"><label>Jml</label></th>
                                        <th class="text-left"><label>Harga</label></th>
                                        <th class="text-left"><label>Subtotal</label></th>
                                    </tr>
                                    <?php
                                    if (!empty($nota_item)) {
                                        $no = 1;
                                        foreach ($nota_item as $nota_item) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $no ?></td>
                                                <td class="text-left">Smoke Gentlement</td>
                                                <td class="text-center">1</td>
                                                <td class="text-left">Rp. 105.000</td>
                                                <td class="text-left">Rp. 105.000</td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                    <?php } ?>

                                    <tr>
                                        <td colspan="4" class="text-right"><label>Total</label></td>
                                        <td class="text-left"><label>Rp. 215.000</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><label>PPN 10%</label></td>
                                        <td class="text-left"><label>Rp. 21.500</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><label>Grand Total</label></td>
                                        <td class="text-left"><label>Rp. 236.500</label></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"></td>
                                        <td class="text-left"><button class="btn btn-primary"><i class="fa fa-fw fa-shopping-cart"></i> Bayar <?php echo nbs(5) ?><i class="fa fa-arrow-right"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <pre>
                <?php print_r($this->session->all_userdata()) ?>
            </pre>
        </div>
    </div>

    <!--</div>-->
    <!-- /.row -->
</div>