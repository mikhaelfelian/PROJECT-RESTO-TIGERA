<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-list"></i> Menu Tambah</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> <a href="<?php echo site_url('page=menu&act=menu_list') ?>" >Daftar Menu</a> >> Tambah Menu
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-6">
            <?php echo $this->session->flashdata('menu') ?>
            <?php foreach($menu_list as $menu_list){ ?>
            <?php echo form_open_multipart('page=menu&act=menu_update') ?>
            <?php echo form_hidden('secure',$this->encrypt->encode_url($menu_list->file)) ?>
            <?php echo form_hidden('id',$_GET['id']) ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Data Menu</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td>
                                <select name="kategori" class="form-control">
                                <option value="">- Pilih -</option>
                                    <?php
                                        $kat = crud::baca('tbl_kategori');
                                        if(!empty($kat)){
                                            foreach($kat as $kat){
                                                ?>
                                                <option value="<?php echo $kat->id_kategori ?>" <?php echo ($kat->id_kategori == $menu_list->id_kategori ? 'selected' : '') ?>><?php echo ucwords($kat->kategori); ?></option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kode Menu</td>
                            <td>:</td>
                            <td><?php echo form_input(array('name'=>'kode','class'=>'form-control','value'=>$menu_list->kode)) ?></td>
                        </tr>
                        <tr>
                            <td>Nama Menu</td>
                            <td>:</td>
                            <td><?php echo form_input(array('name'=>'menu','class'=>'form-control','value'=>$menu_list->menu)) ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td><?php echo form_input(array('name'=>'harga','class'=>'form-control','value'=>$menu_list->harga)) ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td><?php echo form_input(array('name'=>'ket','class'=>'form-control','value'=>$menu_list->ket)) ?></td>
                        </tr>
                        <tr>
                            <td>File Gambar</td>
                            <td>:</td>
                            <td><?php echo form_upload(array('name'=>'file','class'=>'')) ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <img src="<?php echo base_url('../assets/gbr/'.$menu_list->file) ?>" style="width: 160px; height: 160px;" class="img-rounded">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;">
                                <?php echo form_submit(array('value'=>'Update','class'=>'btn btn-primary')) ?>
                                &nbsp;
                                <?php echo form_reset(array('value'=>'Batal','class'=>'btn btn-primary')) ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>           
            <?php echo form_close();  ?>
            <?php } ?>
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>