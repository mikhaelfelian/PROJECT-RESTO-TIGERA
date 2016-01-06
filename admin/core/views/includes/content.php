<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Beranda</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a>
                </li>
            </ol>
        </div>
    </div>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('../') ?>assets/ui/jquery.js"></script>
    <script src="<?php echo base_url('../') ?>assets/ui/jquery-ui.js"></script>
    <script src="<?php echo base_url('../') ?>assets/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url('../') ?>assets/morrisjs/morris.min.js"></script>
    <script type="text/javascript">
        var s = $.noConflict();
        s(function () {
            Morris.Line({
                element: 'grap-penj-tahun',
                data: <?php echo (!empty($penj_tahun) ? json_encode($penj_tahun) : "[{tahun:'0',jumlah:'0'}]")  ?>,
                xkey: ['tahun'],
                ykeys: ['jumlah'],
                labels: ['Omset'],
                hideHover: 'auto',
                resize: true
            });

            Morris.Bar({
                element: 'grap-penj-tinggi',
                data: <?php echo (!empty($penj_tinggi) ? json_encode($penj_tinggi) : "[{bulan:'-',jumlah:'0'}]")     ?>,
                xkey: ['bulan'],
                ykeys: ['jumlah'],
                labels: ['Omset'],
                hideHover: 'auto',
                resize: true
            });
//
//            Morris.Line({
//                element: 'grap-peng-tahun',
//                data: <?php // echo (!empty($peng) ? json_encode($peng->result()) : "[{tahun:'2010',nominal:'0'},{tahun:'2011',nominal:'0'},{tahun:'2012',nominal:'0'},{tahun:'2013',nominal:'0'},{tahun:'2014',nominal:'0'},{tahun:'2015',nominal:'0'}]")     ?>,
//                xkey: 'tahun',
//                ykeys: ['nominal'],
//                labels: ['Jumlah Pengeluaran']
//            });
        });

    </script>
    <!-- Morris Charts JavaScript -->

    <!-- /.col-lg-12 -->
    <!--        <div class="col-lg-12">
                <pre>
    <?php // print_r($this->session->all_userdata());  ?>
                </pre>
            </div>-->
    <div class="row">
        <div class="text-center">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo general::trans_tot_hari_ini() ?></div>
                                <div>Jumlah Transaksi!</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo site_url('page=order&act=order_list') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Lihat ...</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-credit-card fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo general::format_angka_pendek(general::trans_omz_hari_ini()) ?></div>
                                <div>Omset Hari Ini</div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo site_url('page=order&act=order_list') ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Lihat ...</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-building-o fa-fw"></i> Grafik Penjualan per Tahun</h2>
                </div>
                <div class="panel-body">
                    <div id="grap-penj-tahun"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-building-o fa-fw"></i> Grafik omset tertinggi</h2>
                </div>
                <div class="panel-body">
                    <div id="grap-penj-tinggi"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-credit-card fa-fw"></i> Grafik Pengeluaran per Tahun</h2>
                </div>
                <div class="panel-body">
                    <div id="grap-peng-tahun"></div>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>