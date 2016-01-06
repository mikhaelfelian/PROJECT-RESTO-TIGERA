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
        $data['meja'] = crud::baca('tbl_meja');

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('includes/meja/content', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

}
