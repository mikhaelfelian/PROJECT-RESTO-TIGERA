<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-list"></i> Daftar Menu</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> Daftar Menu
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <a href="<?php echo site_url('page=menu&act=menu_tambah') ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</button></a><br/><br/>
        </div>
        <?php
        if (!empty($menu_list)) {
            $no = 1;
            foreach ($menu_list as $menu) {
                ?>
                <div class="col-lg-4 col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">                                
                                <div class="col-xs-9">
                                    <h2 class="panel-title"><?php echo $no . '. ' . ucwords($menu->menu) ?></h2>
                                </div>
                                <div class="col-xs-3 text-right">
                                    <a href="<?php echo site_url('page=menu&act=menu_edit&id='.$this->encrypt->encode_url($menu->id_menu)) ?>" style="color: #fff"><i class="fa fa-edit fa-1x"></i></a>
                                    &nbsp;
                                    <a href="<?php echo site_url('page=menu&act=menu_hapus&id='.$this->encrypt->encode_url($menu->id_menu)) ?>" onclick="return confirm('Hapus [<?php echo ucwords($menu->menu) ?>]')" style="color: #fff"><i class="fa fa-remove fa-1x"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-3">
                                <?php if (!empty($menu->file)) { ?>
                                    <img src="<?php echo base_url('../assets/gbr/' . $menu->file) ?>" class="img-circle" style="width: 100px; height: 100px;">
                                <?php } else { ?>
                                    <i class="fa fa-cutlery fa-5x"></i>
                                <?php } ?>
                            </div>
                            <div class="col-xs-9 text-right">
                                <strong><?php echo $menu->harga ?>K</strong>
                                <p class="text-muted"><?php echo $menu->ket ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $no++;
            }
        }
        ?>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>