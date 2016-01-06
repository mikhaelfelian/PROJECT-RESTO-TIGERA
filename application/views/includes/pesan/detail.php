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

/*
 * Keranjang
 */
$keranjang = $this->cart->contents();

/* Selesai */
?>

<!-- JQueri UI -->
<script src="<?php echo base_url() ?>assets/ui/jquery-2.1.4.min.js"></script>
<!--<script src="<?php echo base_url() ?>assets/ui/jquery.js"></script>-->
<script src="<?php echo base_url() ?>assets/ui/jquery-ui.js"></script>
<!--<script src="<?php echo base_url() ?>assets/ui/autonumeric.js"></script>-->
<link href="<?php echo base_url() ?>assets/ui/jquery-ui.min.css" rel="stylesheet">
<script type="text/javascript">
    var s = $.noConflict();
    s(function() {
//                s('#tgl').datepicker({'dateFormat': 'yy-mm-dd'});

        /* Menu Tambahan */
        s('#menu').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo base_url('json/json_menu_tambahan.json') ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 1,
            select: function(event, ui) {
                var $itemrow = s(this).closest('tr');
                // Populate the input fields from the returned values
                $itemrow.find('#menu').val(ui.item.menu);
                s('#menu').val(ui.item.menu);
                s('#id_menu').val(ui.item.id_menu);
                s('#kode').val(ui.item.kode);
                s('#harga').val(ui.item.harga);

                // Give focus to the next input field to recieve input from user
                s('#ket').focus();
                return false;
            }
            // Format the list menu output of the autocomplete
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            return s("<li></li>")
                    .data("item.autocomplete", item)
                    .append("<a>" + item.menu + "-" + item.harga + "</a>")
                    .appendTo(ul);
        };

        s("#harga").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });

        s("#qty").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });

    });

</script>
<!--JQuery UI-->


<div id="page-wrapper" style="margin-left: 0px;">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header"><i class="fa fa-list"></i> Detail Pesanan</h1>
        </div>
        <div class="col-lg-6 text-right">
            <h1 class="page-header">Meja No. <?php echo $this->encrypt->decode_url($_GET['id']); ?></h1>
        </div>

        <!-- /.col-lg-12 -->
        <div class="col-lg-6">
            <a href="<?php echo base_url() ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i> Kembali</button></a><br/><br/>
        </div>
        <div class="col-lg-6 text-right">
            <?php if ($pesanan->status_order == 'complete') { ?>
                <a href="<?php echo base_url('pesan/kasir.php?nota=' . general::enkrip($pesanan->no_nota)) ?>"><button class="btn btn-primary"><i class="fa fa-fw fa-shopping-cart"></i> Bayar Pesanan</button></a><br/><br/>
            <?php } else { ?>
                <!--<label></label>-->
                <button class="btn btn-default" onclick="alert('Status pesanan harus lengkap')"><i class="fa fa-fw fa-shopping-cart"></i> Bayar Pesanan</button><br/><br/>
            <?php } ?>
        </div>

        <div class="col-lg-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">                                
                        <div class="col-xs-9">
                            <h2 class="panel-title"><i class="fa fa-list"></i> Data Pesanan</h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('pesan/u_status_order.php') ?>
                    <?php echo form_hidden('id', $this->encrypt->encode_url($pesanan->no_nota)) ?>
                    <?php echo form_hidden('id_meja', $this->encrypt->encode_url($pesanan->no_meja)) ?>
                    <table class="table table-striped">
                        <tr>
                            <td style="vertical-align: middle"><label>No. Nota</label></td>
                            <td style="vertical-align: middle"><label>:</label></td>
                            <td style="vertical-align: middle"><?php echo $pesanan->no_nota ?></td>

                            <td style="vertical-align: middle"><label>Nama</label></td>
                            <td style="vertical-align: middle"><label>:</label></td>
                            <td style="vertical-align: middle"><?php echo $pesanan->nama ?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle"><label>No. Meja</label></td>
                            <td style="vertical-align: middle"><label>:</label></td>
                            <td style="vertical-align: middle"><?php echo $pesanan->no_meja ?></td>

                            <td style="vertical-align: middle"><label>Status</label></td>
                            <td style="vertical-align: middle"><label>:</label></td>
                            <td style="vertical-align: middle"><?php echo general::status_resto($pesanan->status_resto) ?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle"><label>Status Pesanan</label></td>
                            <td style="vertical-align: middle"><label>:</label></td>
                            <td style="vertical-align: middle"><?php echo general::status_order($pesanan->status_order) ?></td>

                            <td colspan="2"><?php echo form_dropdown('status', array('confirm' => 'Konfirmasi', 'complete' => 'Lengkap', 'batal' => 'Batal'), 'complete', 'class="form-control"') ?></td>
                            <td><button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button></td>
                        </tr>
                    </table>
                    <?php echo form_close() ?>
                    <?php echo br(2) ?>
                    <table class="table table-responsive">
                        <tr>
                            <th class="text-center"><label>No.</label></th>
                            <th class="text-center"><label>Menu</label></th>
                            <th class="text-center"><label>Jml</label></th>
                            <th class="text-left"><label>Harga</label></th>
                            <th class="text-left"><label>Subtotal</label></th>
                        </tr>
                        <?php
                        if (!empty($menu)) {
                            $no = 1;
                            $total = 0;
                            foreach ($menu as $menu_pesanan) {
                                $total = $total + $menu_pesanan->subtotal;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $no ?></td>
                                    <td class="text-left"><?php echo $menu_pesanan->menu ?></td>
                                    <td class="text-center"><?php echo $menu_pesanan->jml ?></td>
                                    <td class="text-left">Rp. <?php echo number_format($menu_pesanan->harga, 0, ',', '.') ?></td>
                                    <td class="text-left">Rp. <?php echo number_format($menu_pesanan->subtotal, 0, ',', '.') ?></td>
                                </tr>
                                <?php
                                $no++;
                            }
                        }
                        ?>
                        <?php $tax = ($setting->ppn / 100) * $total; ?>
                        <?php $tot = $tax + $total; ?>
                        <tr>
                            <td colspan="4" class="text-right"><label>Total</label></td>
                            <td class="text-left"><label>Rp. <?php echo number_format($total, 0, ',', '.') ?></label></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><label>PPN <?php echo $setting->ppn ?>%</label></td>
                            <td class="text-left"><label>Rp. <?php echo number_format($tax, 0, ',', '.') ?></label></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><label>Grand Total</label></td>
                            <td class="text-left"><label>Rp. <?php echo number_format($tot, 0, ',', '.') ?></label></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right"><label>&nbsp;</label></td>
                            <td class="text-left"><a href="<?php echo base_url('pesan/cetak.php?module=take_order&id='.$_GET['id'].'&nota='.$pesanan->no_nota.'&totalamount='.$tot) ?>"><button class="btn btn-primary"><i class="fa fa-print"></i> Cetak Struk <i class="fa fa-arrow-right"></i></button></a></td>
                        </tr>
                    </table>
                    <label >Catatan : </label><i>Tanda <label>+</label> menu tambahan</i>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">                                
                        <div class="col-xs-9">
                            <h2 class="panel-title"><i class="fa fa-plus"></i> Menu Tambahan</h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php echo form_open('pesan/temp_pesan_menu_t.php') ?>
                    <?php echo form_hidden('id_meja', $_GET['id']) ?>
                    <input id="id_menu" type="hidden" name="id_menu" />
                    <input id="kode" type="hidden" name="kode" />

                    <label>Menu</label>
                    <?php echo form_input(array('id' => 'menu', 'name' => 'nama', 'class' => 'form-control')) ?>
                    <label>Jml</label>
                    <?php echo form_input(array('id' => 'qty', 'name' => 'qty', 'value' => '1', 'class' => 'form-control')) ?>
                    <label>Harga</label>
                    <?php echo form_input(array('id' => 'harga', 'name' => 'harga', 'class' => 'form-control', 'readonly' => 'TRUE')) ?>
                    <label>Keterangan</label>
                    <?php echo form_textarea(array('id' => 'ket', 'name' => 'ket', 'class' => 'form-control')) ?>
                    <?php echo br() ?>
                    <button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">                                
                        <div class="col-xs-9">
                            <h2 class="panel-title"><i class="fa fa-plus-circle"></i> List Menu Tambahan</h2>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
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
                                    <td class="text-center"><a href="<?php echo base_url('pesan/hapus.php?module=pesan_tambahan&meja_id=' . $_GET['id'] . '&id=' . $this->encrypt->encode_url($keranjang['rowid'])) ?>" onclick="return confirm('Hapus ?')"><i class="fa fa-remove"></i> Hapus</a></td>
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
                            <?php $total_tambahan = $pesanan->total + $this->cart->total(); ?>
                            <tr>
                                <th class="text-right" colspan="5"></th>
                                <th class="text-right"><a href="<?php echo base_url('pesan/simpan_menu_tambahan.php?id_meja=' . $_GET['id'] . '&id_pesanan=' . $this->encrypt->encode_url($pesanan->no_nota) . '&total=' . $total_tambahan) ?>"><button class="btn btn-primary">Simpan <i class="fa fa-arrow-right"></i></button></a></th>
                                <th></th>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th colspan="7" class="text-center">Tidak Ada Menu Tambahan</th>
                            </tr>
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

    <!--</div>-->
    <!-- /.row -->
</div>