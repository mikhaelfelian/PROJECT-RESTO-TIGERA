<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function meja() {
        $data['setting'] = $this->db->query("SELECT * FROM tbl_pengaturan")->row();

        $query = $this->db->get('tbl_meja')->result_array();
        $data['meja'] = $query;
        $this->load->view('frontend/templatemeja', $data);
    }

    public function trans_meja_set() {
        $data['setting'] = $this->db->query("SELECT * FROM tbl_pengaturan")->row();

        $key = $this->encrypt->decode_url($_GET['id']);
        $duduk['status'] = 1;
        $this->db->where('id', $key);
        $this->db->update('tbl_meja', $duduk);



        $querymakanan = "SELECT * FROM tbl_menu ORDER BY id_menu DESC";
        $query = $this->db->query($querymakanan)->result();
        $data['menu_list'] = $query;
        $data['meja'] = $key;

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('includes/menu/menu_list', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

    public function trans_meja_batal() {
        $id = $_GET['id'];

        crud::update('tbl_meja', 'id', $this->encrypt->decode_url($id), array('status' => '0'));
        $this->cart->destroy();
        $this->session->unset_userdata('cust');
        redirect(base_url());
    }

    public function temp_cart_set() {
        ob_start();
        $id_meja    = $this->encrypt->decode_url($this->input->post('id_meja'));
        $no_meja    = $this->input->post('no_meja');
        $id_menu    = $this->input->post('id_menu');
        $kd         = $this->input->post('kode');
        $nama       = $this->input->post('nama');
        $harga      = $this->input->post('harga');
        $jml        = $this->input->post('qty');
        $ket        = $this->input->post('ket');
        $tambahan   = str_replace(array('.'), '', $this->input->post('tambahan'));

        $data = array(
            'id' => $kd,
            'qty' => $jml,
            'price' => $harga,
            'name' => $nama,
            'options' => array(
                'id_menu' => $id_menu,
                'id_meja' => $id_meja,
                'tambahan' => (!empty($tambahan) ? $tambahan : '0'),
                'keterangan' => $ket
            )
        );

        $this->cart->insert($data);
        redirect('pesan/meja.php?id=' . $this->encrypt->encode_url($id_meja).'&no_meja='.$no_meja);
        ob_end_flush();
    }

    public function temp_cart_add_set() {
        $id_meja = $this->encrypt->decode_url($this->input->post('id_meja'));
        $id_menu = $this->input->post('id_menu'); // x
        $kd = $this->input->post('kode'); // x
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $jml = $this->input->post('qty');
        $tambahan = str_replace(array('.'), '', $this->input->post('tambahan'));

        $data = array(
            'id' => $kd,
            'qty' => $jml,
            'price' => $harga,
            'name' => $nama,
            'options' => array(
                'id_menu' => $id_menu,
                'id_meja' => $id_meja,
                'tambahan' => (!empty($tambahan) ? $tambahan : '0'),
                'keterangan' => $ket
            )
        );

        $this->cart->insert($data);
        redirect('pesan/detail.php?id=' . $this->encrypt->encode_url($id_meja));
    }

    public function temp_cust_set() {
        $user    = $this->session->userdata('login');
        $id_meja = $this->input->post('id');
        $no_meja = $this->input->post('no_meja');
        $nama    = $this->input->post('nama');
        $status  = $this->input->post('status');

        $cust = array(
            'nama'      => (empty($nama) ? 'Umum' : $nama),
            'meja'      => $this->encrypt->decode_url($id_meja),
            'status'    => $status,
            'pelayan'   => $user['username'],
        );

        $this->session->set_userdata('cust', $cust);
        redirect('pesan/checkout.php?id=' . $id_meja.'&no_meja='.$no_meja);
    }

    public function trans_preview() {
        $data['setting'] = $this->db->query("SELECT * FROM tbl_pengaturan")->row();

        $data['keranjang'] = $this->cart->contents();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('includes/pesan/cekout', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

    public function trans_checkout() {
        $module = $_GET['module'];
        $totalamount = $_GET['total'];

        if (!isset($module) OR empty($module)) {
            $this->session->set_flashdata('transaksi', '<div class="alert alert-warning">Transaksi gagal !!</div>');
            redirect(base_url());
        } else {
            $kas = $this->cart->contents();
            $no_nota = general::no_nota('tbl_orderlist', 'no_nota');
            $cust = $this->session->userdata('cust');
            $total = $this->cart->total();
            $tax = general::tax($this->cart->total());
            $gtotal = $total + $tax;

            $nota = array(
                'no_nota' => $no_nota,
                'nama' => $cust['nama'],
                'no_meja' => $cust['meja'],
                'pelayan' => $cust['pelayan'],
                'jml_bayar' => $total,
                'jml_ppn' => $tax,
                'jml_gtotal' => $gtotal,
                'status_order' => 'confirm',
                'status_payment' => 'unpaid',
                'status_resto' => $cust['status'],
            );

            foreach ($kas as $cart) {
                $nota_det = array(
                    'tgl' => date('Y-m-d H:i:s'),
                    'id_meja' => $cart['options']['id_meja'],
                    'id_menu' => $cart['options']['id_menu'],
                    'keterangan' => $cart['options']['keterangan'],
                    'tambahan' => $cart['options']['tambahan'],
                    'no_nota' => $no_nota,
                    'menu' => $cart['name'],
                    'harga' => $cart['price'],
                    'jml' => $cart['qty'],
                    'subtotal' => $cart['subtotal'],
                );

                crud::simpan('tbl_orderlist_det', $nota_det);
            }

            crud::simpan('tbl_orderlist', $nota);
            $this->cart->destroy();
            $this->session->unset_userdata('cust');
            redirect('pesan/cetak.php?module=take_order&id=' . $this->encrypt->encode_url($cust['meja']) . '&nota=' . $no_nota . '&totalamount=' . $totalamount);
        }
    }

    public function trans_detail() {
        $id = $this->input->get('id');
        $data['setting'] = $this->db->query("SELECT * FROM tbl_pengaturan")->row();

        $data['pesanan'] = $this->db->query("SELECT * FROM tbl_orderlist WHERE no_meja='" . $this->encrypt->decode_url($id) . "' AND status_payment='unpaid' AND status_meja='active'")->row();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_orderlist_det WHERE no_nota='" . $data['pesanan']->no_nota . "'")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('includes/pesan/detail', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

    public function trans_menu_tambahan() {
        $kas = $this->cart->contents();
        $no_nota = $this->input->get('id_pesanan');
        $no_meja = $this->input->get('id_meja');
        $total = $this->input->get('total');

        foreach ($kas as $cart) {
            $nota_det = array(
                'id_meja' => $cart['options']['id_meja'],
                'id_menu' => $cart['options']['id_menu'],
                'tgl' => date('Y-m-d H:i:s'),
                'no_nota' => $this->encrypt->decode_url($no_nota),
                'menu' => '+ ' . $cart['name'],
                'harga' => $cart['price'],
                'jml' => $cart['qty'],
                'subtotal' => $cart['subtotal'],
            );

            crud::simpan('tbl_orderlist_det', $nota_det);
        }

        crud::update('tbl_orderlist', 'no_nota', $this->encrypt->decode_url($no_nota), array('tgl_update' => date('Y-m-d H:i:s'), 'total' => $total));
        $this->cart->destroy();
        redirect('pesan/detail.php?id=' . $no_meja);
    }

    public function cetak() {
        $module = $_GET['module'];
        $data['totalamount'] = $_GET['totalamount'];

        switch ($module) {

            case 'take_order':
                $data['setting'] = $this->db->query("SELECT * FROM tbl_pengaturan")->row();

                $data['keranjang'] = crud::bacaDr('tbl_orderlist', 'no_nota', $_GET['nota']);

                $this->load->view('1_atas', $data);
                $this->load->view('2_navbar_no', $data);
                $this->load->view('includes/pesan/print_to', $data); // Beranda
                $this->load->view('4_bawah', $data);
                break;

            case 'print_termal':
                $this->load->library('user_agent');
                
                $setting   = $this->db->query("SELECT * FROM tbl_pengaturan")->row();

                $keranjang = $this->db->query("SELECT * FROM tbl_orderlist WHERE no_nota='" . $_GET['nota'] . "'")->row();
                $nota_det  = $this->db->query("SELECT * FROM tbl_orderlist_det WHERE no_nota='" . $keranjang->no_nota . "'")->result();
                
                $os_type   = $this->agent->platform();
                
//                $path = realpath('./').'/application/libraries/escpos/Escpos.php';
//
//                require_once($path);
//                $connector   = new FilePrintConnector("/dev/ttyUSB0");
//                $printer     = new Escpos($connector);
//
//                $this->load->library('escpos/escpos','');
//                $this->escpos->getPrintConnector("/dev/ttyS0");
                break;
        }
    }

    public function trans_final() {
        $nota = general::dekrip($_GET['nota']);

        $data['finalize'] = $this->db->query("SELECT DATE(tgl) as tgl, no_nota, no_meja,nama, jml_bayar, jml_gtotal, pelayan, status_order, status_payment ,status_resto,status_meja  FROM tbl_orderlist WHERE tbl_orderlist.no_nota='" . $nota . "'")->row();
        $data['nota_item'] = $this->db->query("SELECT DATE(tgl) as tgl, id_meja, no_nota, menu, keterangan, tambahan, harga, jml, subtotal  FROM tbl_orderlist_det WHERE tbl_orderlist_det.no_nota='" . $nota . "'")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('includes/pesan/kasir', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

    public function trans_final_save() {
        $no_meja = $this->input->post('no_meja');
        $no_nota = $this->input->post('no_nota');
        $cash = $this->input->post('cash');
        $totalbayar = $this->input->post('jml_gtotal');
        $bayar = str_replace(array('.'), '', $cash);
        ;

        $kembalian = $bayar - $totalbayar;

        $data = array(
            'tgl_update' => date('Y-m-d H:i:s'),
            'tot_bayar' => $bayar,
            'tot_kembali' => $kembalian,
            'status_payment' => 'paid',
            'status_meja' => 'inactive'
        );

        crud::update('tbl_orderlist', 'no_nota', general::dekrip($no_nota), $data);
        crud::update('tbl_meja', 'id', general::dekrip($no_meja), array('status' => '0'));
        redirect(base_url());
    }

    public function trans_u_status() {
        $no_nota = $this->input->post('id');
        $id_meja = $this->input->post('id_meja');
        $status = $this->input->post('status');

        crud::update('tbl_orderlist', 'no_nota', $this->encrypt->decode_url($no_nota), array('tgl_update' => date('Y-m-d H:i:s'), 'status_order' => $status));
        redirect('pesan/detail.php?id=' . $id_meja);
    }

    public function hapus() {
        $module = $_GET['module'];

        switch ($module) {
            case 'pesan':
                $meja_id = $_GET['meja_id'];
                $pesan_id = $this->encrypt->decode_url($_GET['id']);

                $cart = array(
                    'rowid' => $pesan_id,
                    'qty' => 0
                );

                $this->cart->update($cart);
                redirect('pesan/checkout.php?id=' . $meja_id);
                break;

            case 'pesan_tambahan':
                $meja_id = $_GET['meja_id'];
                $pesan_id = $this->encrypt->decode_url($_GET['id']);

                $cart = array(
                    'rowid' => $pesan_id,
                    'qty' => 0
                );

                $this->cart->update($cart);
                redirect('pesan/detail.php?id=' . $meja_id);
                break;
        }
    }

    public function trans_destroy_all() {
        $module = $_GET['module'];

        switch ($module) {
            case 'done':
                $meja_id = $_GET['meja_id'];
                $pesan_id = $this->encrypt->decode_url($_GET['id']);

                $cart = array(
                    'rowid' => $pesan_id,
                    'qty' => 0
                );

                $this->cart->update($cart);
                redirect('pesan/checkout.php?id=' . $meja_id);
                break;

            case 'pesan_tambahan':
                $meja_id = $_GET['meja_id'];
                $pesan_id = $this->encrypt->decode_url($_GET['id']);

                $cart = array(
                    'rowid' => $pesan_id,
                    'qty' => 0
                );

                $this->cart->update($cart);
                $this->session->sess_destroy();
                redirect('pesan/detail.php?id=' . $meja_id);
                break;
        }
    }

    public function json_menu_tambahan() {
//        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
        if (isset($_GET['term'])) {
            $sql = $this->db->query("SELECT * FROM tbl_menu WHERE menu LIKE '%" . $_GET['term'] . "%' ORDER BY id_menu DESC")->result();
            echo json_encode($sql);
        } else {
            $sql = $this->db->query("SELECT * FROM tbl_menu ORDER BY id_menu DESC")->result();
            echo json_encode($sql);
        }
//        } else {
//             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
//            redirect(site_url());
//        }
    }

}
