<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Profile</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-database"></i> <a href="<?php echo site_url() ?>">Master</a> >> Profile
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
                    <h2 class="panel-title"><i class="fa fa-user fa-fw"></i></h2>
                </div>
                <div class="panel-body">
                    <?php $has_error = $this->session->flashdata('form_error'); ?>
                    <?php echo form_open('page=pengaturan&act=user_update', 'id="frm"') ?>
                    <div class="form-group <?php echo (empty($has_error['nama']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['nama']) ? '' : 'InputError') ?>">Nama</label>
                        <?php echo $has_error['nama'] ?>
                        <?php echo form_input(array('name' => 'nama', 'class' => 'form-control', 'value' => $user->nama)) ?>
                    </div>

                    <div class="form-group <?php echo (empty($has_error['user']) ? '' : 'has-error') ?>">
                        <label class="control-label" for="<?php echo (empty($has_error['user']) ? '' : 'InputError') ?>">Username</label>
                        <?php echo $has_error['user'] ?>
                        <?php echo form_input(array('name' => 'user', 'class' => 'form-control', 'value' => $user->username)) ?>
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
                            <!--<a href="<?php // echo site_url('page=pengaturan&act=ym') ?>"><?php echo form_button('', '<i class="fa fa-long-arrow-left fa-fw"></i> Kembali', 'class="btn btn-primary"') ?></a>-->
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