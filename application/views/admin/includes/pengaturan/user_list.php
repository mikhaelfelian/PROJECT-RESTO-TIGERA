<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Daftar Admin</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-database"></i> <a href="<?php echo site_url() ?>">Master</a> >> <a href="<?php echo site_url('page=pengaturan') ?>">Pengaturan</a> >> Daftar Administrator
                </li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->

        <div class="col-lg-12">            
            <?php echo $this->session->flashdata('pengaturan'); ?>
        </div>
        
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h2 class="panel-title"><i class="fa fa-file fa-fw"></i></h2>
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th></th>
                        </tr>
                        <?php
                        if (!empty($user)) {
                            $no = 1;
                            foreach ($user as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $user->nama ?></td>
                                    <td><?php echo $user->username ?></td>
                                    <td>
                                        <?php if($user->level != 'root'){ ?>
                                            <a href="<?php echo site_url('page=pengaturan&act=user_hapus&id=' . $this->encrypt->encode_url($user->username)) ?>" onclick="return confirm('Hapus ?')"><i class="fa fa-remove"></i> Hapus</a>
                                        <?php }else{ ?>
                                            <i class="fa fa-remove"></i> Hapus
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php
                                $no++;
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
                    <?php $has_error = $this->session->flashdata('form_error'); ?>
                    <?php echo form_open('page=pengaturan&act=user_simpan', 'id="frm"') ?>
                    <div class="form-group <?php echo (empty($has_error['nama']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['nama']) ? '' : 'InputError') ?>">Nama</label>
                        <?php echo $has_error['nama'] ?>
                        <?php echo form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => $this->session->flashdata('nama'))) ?>
                    </div>

                    <div class="form-group <?php echo (empty($has_error['user']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['user']) ? '' : 'InputError') ?>">Username</label>
                        <?php echo $has_error['user'] ?>
                        <?php echo form_input(array('name' => 'user', 'class' => 'form-control', 'value' => $this->session->flashdata('user'))) ?>
                    </div>

                    <div class="form-group <?php echo (empty($has_error['pass1']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['pass1']) ? '' : 'InputError') ?>">Password</label>
                        <?php echo $has_error['pass1'] ?>
                        <?php echo form_password(array('name' => 'pass1', 'class' => 'form-control')) ?>
                    </div>

                    <div class="form-group <?php echo (empty($has_error['pass2']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['pass2']) ? '' : 'InputError') ?>">Ulang Password</label>
                        <?php echo $has_error['pass2'] ?>
                        <?php echo form_password(array('name' => 'pass2', 'class' => 'form-control')) ?>
                    </div>

                    <div class="col-lg-6">
                        <div class="text-left">
                            <!--<a href="<?php echo site_url('page=pengaturan&act=ym') ?>"><?php echo form_button('', '<i class="fa fa-long-arrow-left fa-fw"></i> Kembali', 'class="btn btn-primary"') ?></a>-->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-right">
                            <?php echo form_reset('v', 'Batal', 'class="btn btn-primary"') ?>
                            <?php echo form_button('v', '<i class="fa fa-save fa-fw"></i> Simpan', 'class="btn btn-primary" onclick="document.getElementById(\'frm\').submit();"') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>