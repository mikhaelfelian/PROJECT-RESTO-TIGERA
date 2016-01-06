<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-users"></i> User List</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> Users
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
                    <table class="table table-responsive">
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th>E-mail</th>
                            <th>Nama</th>
                            <th>Jns Klm</th>
                        </tr>
                        <?php
                        if (!empty($user_list)) {
                            $no = 1;
                            foreach ($user_list['results'] as $user) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no ?></td>
                                    <td><?php echo $user['facebookEmail'] ?></td>
                                    <td><?php echo $user['name'] ?></td>
                                    <td><?php echo (!empty($user['gender']) ? $user['gender'] : '') ?></td>
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
    <!--</div>-->
    <!-- /.row -->
</div>