<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
//        $this->load->helper('captcha');
//        $this->load->library('recaptcha');
    }

    public function index() {
        if (akses::akseslogin() == TRUE):
            redirect('page=home');
        else:
//            $vals = array(
//                'img_path'      => realpath('assets/capjay') . '/',
//                'img_url'       => base_url('assets/capjay/'),
//                'font_path'     => 'system/fonts/libro.ttf',
//                'img_width'     => 328,
//                'img_height'    => 100,
//                'expiration'    => 1200
//            );
//
//            // buat gambar captcha-nya
//            $cap = create_captcha($vals);
//
//            // letakkan gambar sbg variabel
//            $data['image'] = $cap['image'];
//
//            // buat session nya
//            $this->session->set_userdata('capjay', strtoupper($cap['word']));
            
            $data['login'] = '';

            $this->load->view('1_atas', $data);
            $this->load->view('includes/login', $data);
            $this->load->view('4_bawah', $data);
        endif;
    }

    public function cek_login() {
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
            redirect(site_url());
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
//                redirect(site_url());
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
                    redirect('page=home');
                } else {
                    $this->session->set_flashdata('login', '<div class="alert alert-danger">User / pass salah !!!</div>');
                    redirect(base_url('index.php'));
                }
            }
//        }
    }

    public function logout() {
        ob_start();
        $this->session->sess_destroy();
        redirect(site_url());
        ob_end_flush();
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
