<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-gears fa-fw"></i> Pengaturan</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-database"></i> <a href="<?php echo site_url() ?>">Master</a> >> <a href="<?php echo site_url('page=pengaturan') ?>">Pengaturan</a> >> BBpin
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-file fa-fw"></i></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <tr>
                            <th>BBPIN</th>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                        <?php
                        if (!empty($pengaturan)) {
                            foreach ($pengaturan as $pengaturan) {
                                ?>
                                <tr>
                                    <td><?php echo $pengaturan->bbpin ?></td>
                                    <td><?php echo $pengaturan->nama ?></td>
                                    <td>
                                        <a href="<?php echo site_url('page=pengaturan&act=bbpin_hapus&id='.$this->encrypt->encode_url($pengaturan->bbpin)) ?>" onclick="return confirm('Hapus ?')"><i class="fa fa-remove"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-file fa-fw"></i></h2>
                </div>
                <div class="panel-body">
                    <?php echo $this->session->flashdata('pengaturan'); ?>
                    <?php $has_error = $this->session->flashdata('form_error'); ?>
                    <?php echo form_open('page=pengaturan&act=bbpin_simpan', 'id="frm"') ?>
                    <div class="form-group <?php echo (empty($has_error['bbpin']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['bbpin']) ? '' : 'InputError') ?>">BB Pin</label>
                        <?php echo form_input(array('name' => 'bbpin', 'class' => 'form-control', 'value' => $this->session->flashdata('bbpin'))) ?>
                    </div>

                    <div class="form-group <?php echo (empty($has_error['nama']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['nama']) ? '' : 'InputError') ?>">Nama</label>
                        <?php echo form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => $this->session->flashdata('nama'))) ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-left">
                            <!--<a href="<?php echo site_url('page=pengaturan&act=bbpin') ?>"><?php echo form_button('', '<i class="fa fa-long-arrow-left fa-fw"></i> Kembali', 'class="btn btn-primary"') ?></a>-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <?php echo form_button('v', '<i class="fa  fa-save fa-fw"></i> Simpan', 'class="btn btn-primary" onclick="document.getElementById(\'frm\').submit();"') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>