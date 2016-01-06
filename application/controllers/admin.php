<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of admin
 *
 * @author miki
 */
class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $data[''] = '';
        
        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar_no', $data);
        $this->load->view('admin/includes/login', $data); // Beranda
        $this->load->view('4_bawah', $data);
    }

    public function login_cek() {
        $capjay = strtoupper($this->input->post('capjay'));
        $user   = $this->input->post('user');
        $pass   = $this->encrypt->encode_url($this->input->post('pass'));

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        $this->form_validation->set_rules('user', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $msg_error = array(
                'user' => form_error('user'),
                'pass' => form_error('pass')
            );

            $has_error = array(
                'user' => 'has-error',
                'pass' => 'has-error',
            );

            $this->session->set_flashdata('form_error', $msg_error);
            $this->session->set_flashdata('has_error', $has_error);
            
            $this->session->set_flashdata('user', $user);
            redirect('admin');
        } else {
//            //$sess_cap = $this->session->userdata('capjay');
//            // Catch the user's answer
//            $captcha_answer = $this->input->post('g-recaptcha-response');
//
//            // Verify user's answer
//            $sess_cap = $this->recaptcha->verifyResponse($captcha_answer);
//            if ($sess_cap['success'] != 1) {
//                $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, captcha tidak tervalidasi !!</div>');
//                $this->session->set_flashdata('user', $user);
//                redirect();
//            } else {
                $login = akses::cek_login($user, $pass);
                if ($login == TRUE) {
                    $data = array(
                        'nama'          => $login->nama,
                        'username'      => $login->username,
                        'level'         => $login->level,
                        'is_logged_in'  => TRUE,
                    );

                    crud::update('tbl_user', 'username', $user, array('last_login' => date('Y-m-d H:i:s')));
                    $this->session->set_userdata('login', $data);
                    $this->session->set_flashdata('login', 'Login berhasil, silahkan melanjutkan transaksi');
                    redirect('admin/page.php?module=beranda');
                } else {
                    $this->session->set_flashdata('login', '<div class="alert alert-danger">User / pass salah !!!</div>');
                    redirect('admin/login.php');
                }
            }
//        }
    }
}
