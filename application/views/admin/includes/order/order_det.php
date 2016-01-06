<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Order List</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i> <a href="<?php echo site_url('page=home') ?>">Beranda</a> >> <a href="<?php echo site_url('page=order&act=order_list') ?>">Order List</a> >> Order Det
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
                    <?php
                    if (!empty($order_list)) {
                            $url    = 'https://api.parse.com/1/classes/MenuItem/'.$order_list['menuItem']['objectId'];
                            $d      = json_decode(service::read($url), TRUE);
                            $urlV   = 'https://api.parse.com/1/classes/Visit/'.$order_list['visit']['objectId'];
                            $visit  = json_decode(service::read($urlV), TRUE);
                            $urlU   = 'https://api.parse.com/1/users/'.$visit['user']['objectId'];
                            $User   = json_decode(service::read($urlU), TRUE);
//                                              
//                            echo $order_list['menuItem']['objectId'];
//                            echo '<br/>';
//                            echo $visit['user']['objectId'];
//                            echo '<br/>';
//                            echo $user['user']['objectId'];
//                            
//                            echo '<pre>';
//                            print_r($order_list);
//                            echo '</pre>';
//                                                       
//                            echo '<pre>';
//                            print_r($d);
//                            echo '</pre>';
//                                                       
//                            echo '<pre>';
//                            print_r($visit);
//                            echo '</pre>';
//                                                       
//                            echo '<pre>';
//                            print_r($User);
//                            echo '</pre>';
                    ?>
                    Nama User : <?php echo $User['name'] ?><br/>
                    E-mail : <?php echo $User['facebookEmail'] ?><br/>
                    Nama Pesanan : <?php echo $d['name'] ?><br/>
                    Harga : <?php echo $d['price'] ?><br/>
                    Tipe : <?php echo $d['type'] ?><br/>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->
    <!-- /.row -->
</div>