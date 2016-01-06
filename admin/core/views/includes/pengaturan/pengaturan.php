<?php
if (!empty($pengaturan)) {
    foreach ($pengaturan as $pengaturan) {
        ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-gears fa-fw"></i> Pengaturan</h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-database"></i> <a href="<?php echo site_url() ?>">Master</a> >> Pengaturan
                        </li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
                <?php echo form_open_multipart('page=pengaturan&act=simpan', 'id="frm"'); ?>
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title"><i class="fa fa-gears fa-fw"></i> Pengaturan</h2>
                        </div>
                        <div class="panel-body">
                            <!--<div class="form-group">-->
                                <!--<label class="control-label">URL Web</label>-->
                                <?php // echo form_input(array('name' => 'website', 'class' => 'form-control', 'value' => $pengaturan->website)) ?>
                            <!--</div>-->

                            <div class="form-group">
                                <label class="control-label">Nama Resto</label>
                                <?php echo form_input(array('name' => 'judul', 'class' => 'form-control', 'value' => $pengaturan->judul)) ?>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">FB</label>
                                <?php echo form_input(array('name' => 'fb', 'class' => 'form-control','placeholder'=>'isikan : http://www.facebook.com/<username>', 'value' => $pengaturan->fb)) ?>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Twitter</label>
                                <?php echo form_input(array('name' => 'twit', 'class' => 'form-control','placeholder'=>'isikan : @<username_twitter>. Cth : @JohnDoe', 'value' => $pengaturan->twit)) ?>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Google Plus</label>
                                <?php echo form_input(array('name' => 'gplus', 'class' => 'form-control','placeholder'=>'isikan : url google plus anda', 'value' => $pengaturan->gplus)) ?>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <?php echo form_input(array('name' => 'alamat', 'class' => 'form-control','placeholder'=>'isikan : Alamat Restoran', 'value' => $pengaturan->alamat)) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title"><i class="fa fa-gears fa-fw"></i></h2>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>String Nota</label>
                                <?php echo form_input(array('name' => 'string_nota', 'class' => 'form-control', 'value' => $pengaturan->string_nota)) ?>
                                
                                <label>Telp</label>
                                <?php echo form_input(array('name' => 'tlp', 'class' => 'form-control', 'value' => $pengaturan->tlp)) ?>

                                <label>Fax</label>
                                <?php echo form_input(array('name' => 'fax', 'class' => 'form-control', 'value' => $pengaturan->fax)) ?>

                                <label>Logo</label>
                                <input type="file" name="file" value="" class="form-control"> 
                                <br/>
                                <input type="submit" value="Simpan Pengaturan" class="btn btn-primary">
                                <br/>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
        <!-- /.row -->
        </div>
        <?php
    }
}
?>