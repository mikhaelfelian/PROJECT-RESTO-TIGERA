<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-list"></i> Meja Tambah</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> <a href="<?php echo site_url('page=meja&act=meja_list') ?>" >Daftar Meja</a> >> Tambah Meja
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-6">
            <?php echo $this->session->flashdata('meja') ?>
            <?php echo form_open_multipart('page=meja&act=meja_simpan') ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h2 class="panel-title">Data Meja</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <td>Nama Meja</td>
                            <td>:</td>
                            <td><?php echo form_input(array('name'=>'meja','class'=>'form-control')) ?></td>
                        </tr>
                        <tr>
                            <td>File Gambar</td>
                            <td>:</td>
                            <td><?php echo form_upload(array('name'=>'file','class'=>'')) ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td style="text-align: left;">
                                <?php echo form_submit(array('value'=>'Simpan','class'=>'btn btn-primary')) ?>
                                &nbsp;
                                <?php echo form_reset(array('value'=>'Batal','class'=>'btn btn-primary')) ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>           
            <?php echo form_close();  ?>
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>