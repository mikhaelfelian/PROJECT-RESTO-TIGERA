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
        
        <!-- Morris Charts JavaScript -->

        <script src="<?php echo base_url() ?>assets/ui/jquery.js"></script>
        <script src="<?php echo base_url() ?>assets/ui/jquery-ui.js"></script>
        <script src="<?php echo base_url() ?>assets/raphael/raphael-min.js"></script>
        <script src="<?php echo base_url() ?>assets/morrisjs/morris.min.js"></script>
        <script type="text/javascript">
//            var s = $.noConflict();
//            s(function() {
//                Morris.Line({
//                    element: 'grap-penj-tahun',
//                    data: <?php // echo json_encode($penj->result()) ?>,
//                    xkey: 'tahun',
//                    ykeys: ['jumlah'],
//                    labels: ['Jumlah Penjualan'],
//                    hideHover: 'auto',
//                    resize: true
//                });
//
//                Morris.Bar({
//                    element: 'grap-penj-laris',
//                    data: <?php // echo json_encode($laris->result()) ?>,
//                    xkey: ['produk'],
//                    ykeys: ['jumlah'],
//                    labels: ['Jumlah'],
//                    hideHover: 'auto',
//                    resize: true
//                });
//
//            });

        </script>
        <!-- Morris Charts JavaScript -->
        
        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
        </div>
        <!--
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
                        <h2 class="panel-title"><i class="fa fa-building-o fa-fw"></i> Grafik 5 Produk Paling Laris</h2>
                    </div>
                    <div class="panel-body">
                        <div id="grap-penj-laris"></div>
                    </div>
                </div>
            </div>
        -->
        </div>
    <!--</div>-->
    <!-- /.row -->
</div>