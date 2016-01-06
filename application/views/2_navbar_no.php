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
        <?php $session = $this->session->userdata('login') ?>
        <a class="navbar-brand" href="#"><?php echo $setting->judul ?></a>
        <a class="navbar-brand" href="#" style="color: #666666;"><?php echo 'Selamat Datang, ' . ucwords($session['nama']) ?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Pengguna</a>
                </li>
                <li>
                    <a href="<?php echo site_url('front/pengaturan.php') ?>"><i class="fa fa-gear fa-fw"></i> Pengaturan</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('front/logout.php') ?>" onclick="return confirm('Keluar ?')"><i class="fa fa-sign-out fa-fw"></i> Keluar</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->    
    <!-- /.navbar-static-side -->
</nav>
