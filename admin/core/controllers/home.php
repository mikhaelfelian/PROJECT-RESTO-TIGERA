<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of menu
 *
 * @author mike
 */
class home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['penj_tahun'] = $this->db->query("SELECT YEAR(tgl) as tahun, SUM(jml_gtotal) as jumlah FROM tbl_orderlist GROUP BY MONTH(tgl), YEAR(tgl)")->result();
        $data['penj_tinggi'] = $this->db->query("SELECT MONTHNAME(tgl) as bulan, SUM(jml_gtotal) as jumlah FROM tbl_orderlist GROUP BY MONTH(tgl) LIMIT 5")->result();
        $data['penj_bulan'] = $this->db->query("SELECT YEAR(tgl) as tahun, SUM(jml_gtotal) as jumlah FROM tbl_orderlist GROUP BY MONTH(tgl), YEAR(tgl)")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/content', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

    public function tes() {
        $data[''] = '';

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('includes/content', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

}
