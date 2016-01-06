<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Data Transaksi</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> Data Transaksi
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-check-square"></i> Data Transaksi per Hari Ini</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Pemesan</th>
                            <th style="text-align: center;">Total</th>
                            <th style="text-align: center;">PPN</th>
                            <th style="text-align: center;"></th>
                        </tr>
                        <?php
                        if (!empty($order_list)) {
                            $no = 1;
                            $tax_total = 0;
                            $omz_total = 0;
                            foreach ($order_list as $order) {
                                $tax = general::tax($order->jml_bayar);
                                $tax_total = $tax_total + $tax;
                                $omz_total = $omz_total + $order->jml_bayar;
                                ?>
                                <tr>
                                    <td><strong><?php echo $no ?>. </strong></td>
                                    <td class="text-left"><a href="<?php echo site_url('page=order&act=order_det&id=' . general::enkrip($order->no_nota)) ?>"><?php echo $order->no_nota ?></a></td>
                                    <td class="text-left"><?php echo $this->tanggalan->tgl_indo($order->tgl) ?></td>
                                    <td class="text-left"><?php echo $order->nama ?></td>
                                    <td class="text-left">Rp. <?php echo number_format($order->jml_bayar, 0, ',', '.') ?></td>
                                    <td class="text-left">Rp. <?php echo number_format($tax, 0, ',', '.') ?></td>
                                    <td class="text-center"><?php echo general::status_byr($order->status_payment) ?></td>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                            <tr>
                                <th class="text-left" colspan="4"></th>
                                <th class="text-left"><label>Rp. <?php echo number_format($omz_total, 0, ',', '.') ?></label></th>
                                <th class="text-left"><label>Rp. <?php echo number_format($tax_total, 0, ',', '.') ?></label></th>
                                <th class="text-center"></th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>