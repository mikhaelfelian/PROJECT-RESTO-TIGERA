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

                    <table class="table table-striped">
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Meja</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>

                        <?php
                        if (!empty($meja_list)) {
                            $no = 1;
                            foreach ($meja_list as $meja) {
                                ?>
                                <tr>
                                    <td class="text-center"><label><?php echo $no ?>. </label></td>
                                    <td><?php echo $meja->no_meja ?></td>
                                    <td class="text-center"><?php echo general::status_meja($meja->status) ?></td>
                                    <td class="text-center">
                                    <?php if($meja->status == '1'){ ?>
                                        <a href="<?php echo site_url('page=meja&act=meja_reset&id='.$this->encrypt->encode_url($meja->id)) ?>" onclick="return confirm('Reset Meja ?')"><i class="fa fa-recycle"></i> Kosongkan</a>
                                    <?php }else{ ?>
                                        <i class="fa fa-recycle"></i> Kosongkan
                                    <?php } ?>
                                    </td>
                                    <td class="text-center"><a href="<?php echo site_url('page=meja&act=meja_hapus&id='.$this->encrypt->encode_url($meja->id)) ?>" onclick="return confirm('Hapus Meja ?')"><i class="fa fa-remove"></i> Hapus</a></td>
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