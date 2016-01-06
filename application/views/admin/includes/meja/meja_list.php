<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-list"></i> Daftar Menu</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> Meja
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Meja List</h2>
                </div>
                <div class="panel-body">
                    <a href="<?php echo site_url('page=meja&act=meja_tambah') ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Tambah</button></a><br/><br/>

                    <table class="table table-responsive">
                        <tr>
                            <th>No</th>
                            <th>Nama Meja</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;"></th>
                            <th style="text-align: center;"></th>
                        </tr>

                        <?php
                        if (!empty($meja_list)) {
                            $no = 1;
                            foreach ($meja_list as $meja) {
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $meja->no_meja ?></td>
                                    <td style="text-align: center;"><?php echo general::status($meja->status) ?></td>
                                    <td style="text-align: center;"><a href="<?php echo site_url('page=meja&act=meja_reset&id='.$this->encrypt->encode_url($meja->id)) ?>" onclick="return confirm('Reset Meja ?')"><i class="fa fa-recycle"></i> Kosongkan</a></td>
                                    <td style="text-align: center;"><a href="<?php echo site_url('page=meja&act=meja_hapus&id='.$this->encrypt->encode_url($meja->id)) ?>" onclick="return confirm('Hapus Meja ?')"><i class="fa fa-remove"></i> Hapus</a></td>
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
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>