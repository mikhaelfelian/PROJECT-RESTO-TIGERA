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
        <a class="navbar-brand" href="" target="_blank"><?php echo $setting->judul ?></a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="<?php echo site_url() ?>"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
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
                    <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Taking Order<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('page=order&act=order_list') ?>"><i class="fa fa-check-circle-o fa-fw"></i> List Order</a></li>
                        <!--<li><a href="<?php echo site_url('page=transaksi&act=trans_jual') ?>"><i class="fa fa-check-circle-o fa-fw"></i> Print</a></li>-->
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
