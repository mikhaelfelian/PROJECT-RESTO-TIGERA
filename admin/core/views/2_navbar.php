<?php $user = $this->session->userdata('login') ?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php $setting = $this->db->query("SELECT * FROM tbl_pengaturan")->row() ?>
        <a class="navbar-brand" href="<?php echo base_url('../') ?>" target="_blank"><?php echo $setting->judul ?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Pengguna</a>
                </li>
                <li><a href="<?php echo site_url('page=pengaturan') ?>"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('page=login&act=logout') ?>" onclick="return confirm('Keluar ?')"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <?php
                        echo br(1);
//                        echo '
//                        <input type="text" class="form-control" placeholder="Search...">
//                        <span class="input-group-btn">
//                            <button class="btn btn-default" type="button">
//                                <i class="fa fa-search"></i>
//                            </button>
//                        </span>
//                        ';
                        
                        ?>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="<?php echo site_url() ?>"><i class="fa fa-home fa-fw"></i> Beranda</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-database fa-fw"></i> Master Data<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('page=meja&act=meja_list') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Data Meja</a></li>
                        <li><a href="<?php echo site_url('page=menu&act=menu_list') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Data Menu</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Transaksi Pembelian<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('page=order&act=order_list') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Data Transaksi</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Transaksi Penjualan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('page=order&act=order_list') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Data Transaksi</a></li>
                        <li><a href="<?php echo site_url('page=order&act=order_list_batal') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Data Transaksi Batal</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-archive fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('page=laporan&act=lap_penj') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Laporan Penjualan</a></li>
                        <li><a href="<?php echo site_url('page=laporan&act=lap_pemb') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Laporan Pembelian</a></li>
                        <li><a href="<?php echo site_url('page=laporan&act=lap_lr') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Laporan Laba Rugi</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-gear fa-fw"></i> Pengaturan<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('page=pengaturan') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Pengaturan</a></li>
                        <li><a href="<?php // echo site_url('page=pengaturan&act=profile')  ?>"><i class="fa fa-check-circle-o fa-fw"></i> Ganti Password</a></li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
