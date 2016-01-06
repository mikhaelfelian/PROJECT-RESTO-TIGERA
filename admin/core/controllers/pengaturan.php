<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of pengaturan
 *
 * @author miki
 * 
 */
class pengaturan extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $login = $this->session->userdata('login');
    }
    
    public function index() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
			$data['pengaturan']  = $this->db->query("SELECT * FROM tbl_pengaturan")->result();

            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
//            $this->load->view('tinimce', $data);
            $this->load->view('includes/pengaturan/pengaturan', $data); // Beranda
            $this->load->view('4_bawah', $data);
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function simpan() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            crud::update('tbl_pengaturan','id_pengaturan','1',$_POST);
            redirect('page=pengaturan');
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function bbpin() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $data['pengaturan']  = $this->db->query("SELECT * FROM tbl_bbpin")->result();
            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
            $this->load->view('includes/pengaturan/bbpin', $data); // Beranda
            $this->load->view('4_bawah', $data);
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function bbpin_simpan() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $bbpin = $this->input->post('bbpin');
            $nama  = $this->input->post('nama');
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            $this->form_validation->set_rules('bbpin', 'PIN BB', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'bbpin' => form_error('bbpin'),
                    'nama'  => form_error('nama')
                );
                
                $has_error = array(
                    'bbpin' => 'has-error',
                    'nama'  => 'has-error',
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);
                redirect('page=pengaturan&act=bbpin');
            }else{
                $data = array(
                    'bbpin' => $bbpin,
                    'nama'  => $nama,
                );
                $s = crud::simpan('tbl_bbpin',$data);
                if($s == TRUE){
                    $this->session->set_flashdata('produk','<div class="alert alert-success">Simpan berhasil !!</div>');
                    redirect('page=pengaturan&act=bbpin');
                }
            }
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function bbpin_hapus() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $id = $this->encrypt->decode_url($_GET['id']);
            crud::delete('tbl_bbpin','bbpin',$id);
            redirect('page=pengaturan&act=bbpin');
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function ym() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $data['pengaturan']  = $this->db->query("SELECT * FROM tbl_ymid")->result();
            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
            $this->load->view('includes/pengaturan/ym', $data); // Beranda
            $this->load->view('4_bawah', $data);
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function ym_simpan() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $ym    = $this->input->post('ym');
            $nama  = $this->input->post('nama');
            $logo  = $this->input->post('logo');
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            $this->form_validation->set_rules('ym', 'YM ID', 'required');
            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('logo', 'Logo', 'required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'ym' => form_error('ym'),
                    'logo' => form_error('logo'),
                    'nama'  => form_error('nama')
                );
                
                $has_error = array(
                    'ym' => 'has-error',
                    'logo' => 'has-error',
                    'nama'  => 'has-error',
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);

                $this->session->set_flashdata('ym', $ym);
                $this->session->set_flashdata('nama', $nama);
                $this->session->set_flashdata('logo', $logo);
                redirect('page=pengaturan&act=ym');
            }else{
                $data = array(
                    'ymid' => $ym,
                    'nama' => $nama,
                    'logo' => $logo,
                );
                $s = crud::simpan('tbl_ymid',$data);
                if($s == TRUE){
                    $this->session->set_flashdata('produk','<div class="alert alert-success">Simpan berhasil !!</div>');
                    redirect('page=pengaturan&act=ym');
                }
            }
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function ym_hapus() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $id = $this->encrypt->decode_url($_GET['id']);
            crud::delete('tbl_ymid','ymid',$id);
            redirect('page=pengaturan&act=ym');
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }    
    
    public function profile() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $ses           = $this->session->userdata('login');
            $data['user']  = $this->db->query("SELECT * FROM tbl_user WHERE username ='".$ses['username']."'")->row();
            
            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
            $this->load->view('includes/pengaturan/user', $data); // Beranda
            $this->load->view('4_bawah', $data);
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function user_list() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $data['user']  = $this->db->query("SELECT * FROM tbl_user WHERE username !='admin2dev'")->result();
            
            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
            $this->load->view('includes/pengaturan/user_list', $data); // Beranda
            $this->load->view('4_bawah', $data);
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function user_simpan() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $nama  = $this->input->post('nama');
            $user  = $this->input->post('user');
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2');
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('user', 'Username', 'trim|required|min_length[4]');
            $this->form_validation->set_rules('pass1', 'Password', 'trim|required|min_length[5]|matches[pass2]');
            $this->form_validation->set_rules('pass2', 'Ulang Password', 'trim|required|min_length[5]');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'nama'   => form_error('nama'),
                    'user'   => form_error('user'),
                    'pass1'  => form_error('pass1'),
                    'pass2'  => form_error('pass2')
                );
                
                $has_error = array(
                    'nama'   => 'has-error',
                    'user'   => 'has-error',
                    'pass1'  => 'has-error',
                    'pass2'  => 'has-error',
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);

                $this->session->set_flashdata('nama', $nama);
                $this->session->set_flashdata('user', $user);
                redirect('page=pengaturan&act=user_list');
            }else{
                $pass_secure = $this->encrypt->encode_url($pass1);
                
//                if($pass1 != $pass2){                    
//                    $this->session->set_flashdata('nama', $nama);
//                    $this->session->set_flashdata('user', $user);
//                    $this->session->set_flashdata('pengaturan','<div class="alert alert-danger">Password tidak sama !!</div>');
//                }else{
                    $cek = $this->db->query("SELECT * FROM tbl_user WHERE username='".$user."'")->num_rows();

                    if($cek == 1){
                        $this->session->set_flashdata('nama', $nama);
                        $this->session->set_flashdata('user', $user);
                        $this->session->set_flashdata('pengaturan', '<div class="alert alert-danger">Username tidak bisa digunakan / sudah ada !!</div>');
                        redirect('page=pengaturan&act=user_list');
                    }else{
                        $data = array(
                        'nama' => $ym,
                            'nama'       => $nama,
                            'username'   => $user,
                            'password'   => $pass_secure,
                            'status'     => 'active',
                            'level'      => 'user',
                        );

                        $s = crud::simpan('tbl_user', $data);
                        if ($s == TRUE) {
                            $this->session->set_flashdata('produk', '<div class="alert alert-success">Username : <b>' . $user . '</b>, berhasil ditambahkan !!</div>');
                            redirect('page=pengaturan&act=user_list');
                        }else{
                            $this->session->set_flashdata('pengaturan', '<div class="alert alert-danger">Username gagal disimpan !!</div>');
                            redirect('page=pengaturan&act=user_list');
                        }
                    }
//                }
            }
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
    
    public function user_hapus() {
        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $id = $this->encrypt->decode_url($_GET['id']);
            crud::delete('tbl_user','username',$id);
            $this->session->set_flashdata('pengaturan', '<div class="alert alert-success">Username : <b>' . $id . '</b>, berhasil dihapus !!</div>');
            redirect('page=pengaturan&act=user_list');
        } else {
             $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
            redirect(site_url());
        }
    }
}
