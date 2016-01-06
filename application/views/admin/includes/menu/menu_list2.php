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
        <?php
        if(!empty($menu_list)){
            $no = 1;
            foreach($menu_list as $menu){
            ?>
            <table class="table" style="border: 0px;">
                <tr>
                    <td rowspan="3" style="width: 166px;"><img src="<?php echo base_url('../assets/gbr/'.$menu->file) ?>" class="img-circle" style="width: 160px; height: 160px;"></td>
                    <td style="height:20px;"><b><?php echo $no ?>. <?php echo ucwords($menu->menu) ?></b></td>
                    <td style="height:20px; width: 135px;"><a href="<?php echo site_url('page=menu&act=menu_edit&id='.$this->encrypt->encode_url($menu->id_menu)) ?>"><i class="fa fa-fw fa-edit fa-1x"></i> Edit</a> <a href="<?php echo site_url('page=menu&act=menu_hapus&id='.$this->encrypt->encode_url($menu->id_menu)) ?>" onclick="return confirm('Hapus [<?php echo ucwords($menu->menu) ?>]')"><i class="fa fa-fw fa-remove fa-1x"></i> Hapus</a></td>
                </tr>
                <tr>
                    <td colspan="2" style="height:20px;"><?php echo number_format($menu->harga,0,',','.') ?>K</td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $menu->ket ?></td>
                </tr>
            </table>
            <?php
            $no++;
            }
        }
        ?>
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>