<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of menu
 *
 * @author mike
 */

class menu extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function menu_list(){
        $data['menu_list'] = $this->db->query("SELECT * FROM tbl_menu ORDER BY id_menu DESC")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/menu/menu_list', $data);
        $this->load->view('4_bawah', $data);
    }
    
    public function menu_edit(){
            $id = $this->encrypt->decode_url($_GET['id']);
            $data['menu_list'] = crud::bacaDr('tbl_menu','id_menu',$id);

            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
            $this->load->view('includes/menu/menu_edit', $data);
            $this->load->view('4_bawah', $data);
    }
    
    public function menu_update(){
            $kat    = $this->input->post('kategori');
            $kode   = $this->input->post('kode');
            $menu   = $this->input->post('menu');
            $harga  = $this->input->post('harga');
            $ket    = $this->input->post('ket');
            $id     = $this->input->post('id');
            $f_foto = $this->encrypt->decode_url($this->input->post('secure'));
            $folder = realpath('../assets/gbr');
            $file   = $_FILES['file']['name'];
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('kode', 'Kode Menu', 'required');
            $this->form_validation->set_rules('menu', 'Menu', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
//             $this->form_validation->set_rules('file', 'File', 'required');
            $this->form_validation->set_rules('ket', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'kategori'  => form_error('penjahit'),
                    'kode'      => form_error('kode'),
                    'menu'      => form_error('menu'),
                    'harga'     => form_error('harga'),
                    'file'      => form_error('file')
                );
                
                $has_error = array(
                    'kategori'  => 'has-error',
                    'kode'      => 'has-error',
                    'menu'      => 'has-error',
                    'harga'     => 'has-error',
                    'file'      => 'has-error'
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);
                redirect('page=menu&act=menu_edit&id='.$id);
            }else{
                if (!empty($file)) {
                    // Konfigurasi upload gambar
                    $config['upload_path']      = $folder;
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '4096';
                    $config['remove_spaces']    = TRUE;
//                    $config['file_name']        = 'menu_'.strtolower($menu);
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('menu', '<div class="alert alert-danger">Error : <b>' . $this->upload->display_errors() . '</b></div>');
                        redirect('page=menu&act=menu_edit&id='.$id);
                    } else {
                        if(!empty($f_foto)){
                            unlink(realpath('../assets/gbr/').'/'.$f_foto);
                        }
                        
                        $f = $this->upload->data();                        
                        $data = array(
                            'id_kategori'  => $kat,
                            'kode'         => $kode,
                            'menu'         => $menu,
                            'harga'        => $harga,
                            'file'         => $f['orig_name'],
                            'ket'          => $ket
                        );
                    }
                }else{
                    $data = array(
                        'id_kategori'  => $kat,
                        'kode'         => $kode,
                        'menu'         => $menu,
                        'harga'        => $harga,
                        'ket'          => $ket
                    );
                }
                
                crud::update('tbl_menu','id_menu',$this->encrypt->decode_url($id),$data);
                $this->session->set_flashdata('menu', '<div class="alert alert-success">Data menu sudah disimpan !!!</div>');
                redirect('page=menu&act=menu_edit&id=' . $id);
        }
    }

    public function menu_tambah(){
        $id = ''; //'https://api.parse.com/1/classes/MenuItem';
        $data['menu_list'] = ''; //json_decode(service::read($url), TRUE);

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/menu/menu_tambah', $data);
        $this->load->view('4_bawah', $data);
    }

    public function menu_simpan(){
            $kat    = $this->input->post('kategori');
            $kode   = $this->input->post('kode');
            $menu   = $this->input->post('menu');
            $harga  = $this->input->post('harga');
            $ket    = $this->input->post('ket');
            $folder = realpath('../assets/gbr');
            $file   = $_FILES['file']['name'];
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('kode', 'Kode Menu', 'required');
            $this->form_validation->set_rules('menu', 'Menu', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
            $this->form_validation->set_rules('ket', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'kategori'  => form_error('penjahit'),
                    'kode'      => form_error('kode'),
                    'menu'      => form_error('menu'),
                    'harga'     => form_error('harga'),
                    'file'      => form_error('file')
                );
                
                $has_error = array(
                    'kategori'  => 'has-error',
                    'kode'      => 'has-error',
                    'menu'      => 'has-error',
                    'harga'     => 'has-error',
                    'file'      => 'has-error'
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);
                redirect('page=menu&act=menu_tambah');
            }else{
                if (!empty($file)) {
                    // Konfigurasi upload gambar
                    $config['upload_path']      = $folder;
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '4096';
                    $config['remove_spaces']    = TRUE;
                    $config['file_name']        = 'menu_'.strtolower($menu);
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('menu', '<div class="alert alert-danger">Error : <b>' . $this->upload->display_errors() . '</b></div>');
                        redirect('page=menu&act=menu_tambah');
                    } else {
                        $f = $this->upload->data();
                        
                        $data = array(
                            'id_kategori'  => $kat,
                            'kode'         => $kode,
                            'menu'         => $menu,
                            'harga'        => $harga,
                            'file'         => $f['orig_name'],
                            'ket'          => $ket
                        );
                    }
                }else{
                    $data = array(
                        'id_kategori'  => $kat,
                        'kode'         => $kode,
                        'menu'         => $menu,
                        'harga'        => $harga,
                        'ket'          => $ket
                    );
                }
                
                
                crud::simpan('tbl_menu',$data);
                $this->session->set_flashdata('menu', '<div class="alert alert-success">Data menu sudah disimpan !!!</div>');
                redirect('page=menu&act=menu_tambah');
            }
    }
    
    public function menu_hapus(){
//        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $id = $this->encrypt->decode_url($_GET['id']);
            crud::delete('tbl_menu','id_menu',$id);
            
            redirect('page=menu&act=menu_list');
//        } else {
//            $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
//            redirect(site_url());
//        }
    }
}
