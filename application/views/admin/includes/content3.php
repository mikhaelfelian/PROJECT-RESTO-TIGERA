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

        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <?php echo $itung ?>
            <table class="table table-responsive">
                <tr>
                    <th>No</th>
                    <th>Kec ID</th>
                    <th>Nama Desa</th>
                </tr>
                <?php
//                $no = 1;
//                foreach ($desa as $desa) {
                    ?>
                    <tr>
                        <!--<th><?=$no; ?></th>-->
                        <th>Tgl Order</th>
                        <th><?php // echo $desa->nama_desa ?></th>
                    </tr>
                    <?php
//                    $no++;
//                }
                ?>
            </table>
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