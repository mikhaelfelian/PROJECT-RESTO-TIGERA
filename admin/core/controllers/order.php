<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of order
 *
 * @author mike
 */
class order extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function order_list() {
        $data['order_list'] = $this->db->query("SELECT DATE(tgl) as tgl, TIME(tgl) as waktu, no_nota, nama, jml_bayar, pelayan, status_order, status_payment, status_resto FROM tbl_orderlist WHERE status_payment='paid' AND status_meja='inactive' AND DATE(tgl)='".date('Y-m-d')."'")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/order/order_list', $data);
        $this->load->view('4_bawah', $data);
    }

    public function order_list_batal() {
        $data['order_list'] = $this->db->query("SELECT DATE(tgl) as tgl, TIME(tgl) as waktu, no_nota, nama, jml_bayar, pelayan, status_order, status_payment, status_resto FROM tbl_orderlist WHERE status_order='batal' AND status_payment='unpaid' AND status_meja='active' AND DATE(tgl)='".date('Y-m-d')."'")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/order/order_list', $data);
        $this->load->view('4_bawah', $data);
    }

    public function order_det() {
        $no_nota            = $this->input->get('id');
        $data['order_list'] = $this->db->query("SELECT DATE(tgl) as tgl, TIME(tgl) as waktu, no_nota, nama, jml_bayar, pelayan, status_order, status_payment, status_resto FROM tbl_orderlist WHERE no_nota='".$no_nota."'")->row();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/order/order_det', $data);
        $this->load->view('4_bawah', $data);
    }

    public function visit_list() {
        $url = 'https://api.parse.com/1/classes/Visit/';
        $data['order_list'] = ''; //json_decode(service::read($url), TRUE);

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/order/visit_list', $data);
        $this->load->view('4_bawah', $data);
    }
}
