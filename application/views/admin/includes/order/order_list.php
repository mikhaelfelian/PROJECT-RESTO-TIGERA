<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Order List</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> Order List
                </li>
            </ol>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">Order List</h2>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <tr>
                            <th>No</th>
                            <th>Tgl Order</th>
                            <th>Jam Order</th>
                            <th>Order ID</th>
                            <th style="text-align: center;">Quantity</th>
                        </tr>
                        <?php
                        if (!empty($order_list)) {
                            $no = 1;
                            foreach ($order_list['results'] as $order) {
                                $tgl = explode('T', $order['createdAt']);
                                $wkt = explode('.', $tgl[1]);
                                
                                $visitID = $order['visit']['objectId'];
                                $urlvisit = 'https://api.parse.com/1/classes/Visit/'.$visitID;
                                
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $this->tanggalan->tgl_indo($tgl[0]) ?></td>
                                    <td><?php echo $wkt[0] ?></td>
                                    <td><a href="<?php echo site_url('page=order&act=order_det&id='.$order['objectId']) ?>"><?php echo $order['objectId'] ?></a></td>
                                    <td style="text-align: center;"><?php echo $order['quantity'] ?></td>
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