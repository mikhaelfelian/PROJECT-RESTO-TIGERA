<?php
/*
 * Session untuk ambil data cust dan meja
 * - Variabel $sesi_cust['nama']   => Memuat data nama cust;
 * - Variabel $sesi_cust['status'] => Memuat data status makan ditempan ato bungkus;
 */

$sesi_cust = $this->session->userdata('cust');


/*
 * Generate No. Nota
 */
$IDbaru = general::no_nota('tbl_orderlist', 'no_nota');

/* Selesai */
?>


<div id="page-wrapper" style="margin-left: 0px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header"><i class="fa fa-check"></i> Cek Pesanan</h1>
        </div>
        <div class="col-lg-6 text-right">
            <h1 class="page-header">Meja No. <?php echo $this->encrypt->decode_url($_GET['id']) . ' (' . $this->cart->total_items() . ' Pesanan)'; ?></h1>
        </div>
    </div>

    <div class="row">
        <!-- /.col-lg-12 -->
        <div class="col-lg-6">
            <a href="<?php echo base_url('pesan/meja.php?id=' . $_GET['id'].'&no_meja='.$_GET['no_meja']) ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-arrow-left"></i> Kembali</button></a><br/><br/>
        </div>
        <div class="col-lg-6 text-right">
            <?php if(!empty($sesi_cust)){ ?>
                <a href="<?php echo base_url('pesan/proses.php?module=take_order&id=' . $_GET['id'].'&no_meja='.$_GET['no_meja'].'&total=' . $this->cart->total()) ?>"><button class="btn btn-primary">Lanjut <i class="fa fa-fw fa-arrow-right"></i></button></a><br/><br/>
            <?php }else{ ?>
                <a href="#" onclick="alert('Setel nama pengguna dahulu !!')"><button class="btn btn-default">Lanjut <i class="fa fa-fw fa-arrow-right"></i></button></a><br/><br/>
            <?php } ?>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">                                
                        <div class="col-xs-9">
                            <h2 class="panel-title"><i class="fa fa-shopping-cart"></i> Data Pesanan</h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('pesan/set_cust.php') ?>
                    <?php echo form_hidden('id', $_GET['id']) ?>
                    <?php echo form_hidden('no_meja', $_GET['no_meja']) ?>
                    <?php // echo form_hidden('total', $total_harga) ?>
                    <table class="table table-striped" style="border: 0px solid;">
                        <tr>
                            <td>Nama Cust</td>
                            <td><?php echo form_input(array('name' => 'nama', 'class' => 'form-control')) ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <select name="status" class="form-control">
                                    <option value="1">Makan ditempat</option>
                                    <option value="2">Bungkus</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td><button class="btn btn-primary">Setel Pelanggan <i class="fa fa-arrow-right"></i></button></td>
                        </tr>
                    </table>
                    <?php echo form_open() ?>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">                                
                        <div class="col-xs-9">
                            <h2 class="panel-title"><i class="fa fa-shopping-cart"></i> Data Pesanan</h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table-condensed">
                        <tr>
                            <td><label>No. Nota</label></td>
                            <td><label>:</label></td>
                            <td><?php echo $IDbaru ?></td>

                            <td>&nbsp;</td>

                            <td><label>No. Meja</label></td>
                            <td><label>:</label></td>
                            <td><?php echo $_GET['no_meja'] ?></td>
                        </tr>
                        <tr>
                            <td><label>Nama Pelanggan</label></td>
                            <td><label>:</label></td>
                            <td><?php echo $sesi_cust['nama'] ?></td>

                            <td>&nbsp;</td>

                            <td><label>Status</label></td>
                            <td><label>:</label></td>
                            <td><?php echo general::status_resto($sesi_cust['status']) ?></td>
                        </tr>
                    </table>
                    <?php echo br() ?>
                    <table class="table table-striped">
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Menu</th>
                            <th>Keterangan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Harga</th>
                            <th class="text-right">Total</th>
                            <th class="text-center"></th>
                        </tr>
                        <?php
                        if (!empty($keranjang)) {
                            $no = 1;
                            $total_harga = 0;
                            foreach ($keranjang as $keranjang) {
                                $total_harga = $total_harga + $keranjang['subtotal'];
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no ?>. </td>
                                    <td><?php echo $keranjang['name'] ?></td>
                                    <td><?php echo (!empty($keranjang['options']['keterangan']) ? $keranjang['options']['keterangan'] : '-') ?></td>
                                    <td class="text-center"><?php echo $keranjang['qty'] ?></td>
                                    <td class="text-right">Rp. <?php echo number_format($keranjang['price'], 0, ',', '.') ?></td>
                                    <td class="text-right">Rp. <?php echo number_format($keranjang['subtotal'], 0, ',', '.') ?></td>
                                    <td class="text-center"><a href="<?php echo base_url('pesan/hapus.php?module=pesan&meja_id=' . $_GET['id'] . '&id=' . $this->encrypt->encode_url($keranjang['rowid'])) ?>" onclick="return confirm('Hapus ?')"><i class="fa fa-remove"></i> Hapus</a></td>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                            <tr>
                                <th class="text-right" colspan="5">Total</th>
                                <th class="text-right">Rp. <?php echo number_format($total_harga, 0, ',', '.') ?></th>
                                <th></th>
                            </tr>
                            <!--<tr>-->
                                <!--<th class="text-right" colspan="5">PPN 10%</th>-->
                                <!--<th class="text-right">Rp. <?php // echo number_format($total_harga, 0, ',', '.')         ?></th>-->
                                <!--<th></th>-->
                            <!--</tr>-->
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <pre>
                <?php print_r($this->session->all_userdata()) ?>
            </pre>
        </div>
    </div>
</div>

<!--</div>-->
<!-- /.row -->
</div>