<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of meja
 *
 * @author mike
 */

class meja extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function meja_list(){
        $data['meja_list'] = $this->db->query("SELECT * FROM tbl_meja ORDER BY id DESC")->result();

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/meja/meja_list', $data);
        $this->load->view('4_bawah', $data);
    }
    
    public function meja_edit(){
            $id = $this->encrypt->decode_url($_GET['id']);
            $data['meja_list'] = crud::bacaDr('tbl_meja','id_meja',$id);

            $this->load->view('1_atas', $data);
            $this->load->view('2_navbar', $data);
            $this->load->view('includes/meja/meja_edit', $data);
            $this->load->view('4_bawah', $data);
    }
    
    public function meja_update(){
            $kat   = $this->input->post('kategori');
            $kode  = $this->input->post('kode');
            $meja  = $this->input->post('meja');
            $harga = $this->input->post('harga');
            $ket   = $this->input->post('ket');
            $id    = $this->input->post('id');
            $file  = $_FILES['file']['name'];
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('kode', 'Kode Menu', 'required');
            $this->form_validation->set_rules('meja', 'Menu', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');
//             $this->form_validation->set_rules('file', 'File', 'required');
            $this->form_validation->set_rules('ket', 'Keterangan', 'required');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'kategori'  => form_error('penjahit'),
                    'kode'      => form_error('kode'),
                    'meja'      => form_error('meja'),
                    'harga'     => form_error('harga'),
                    'file'      => form_error('file')
                );
                
                $has_error = array(
                    'kategori'  => 'has-error',
                    'kode'      => 'has-error',
                    'meja'      => 'has-error',
                    'harga'     => 'has-error',
                    'file'      => 'has-error'
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);
                redirect('page=meja&act=meja_tambah');
            }else{
                if (!empty($file)) {
                    
                }else{
                    $data = array(
                        'id_kategori'  => $kat,
                        'kode'         => $kode,
                        'meja'         => $meja,
                        'harga'        => $harga,
                        'ket'          => $ket
                    );
                                        
                    crud::update('tbl_meja','id_meja',$this->encrypt->decode_url($id),$data);
                    $this->session->set_flashdata('meja', 'Data meja sudah disimpan !!!');
                    redirect('page=meja&act=meja_edit&id='.$id);
                }
            }
    }

    public function meja_tambah(){
        $id = '';
        $data['meja_list'] = '';

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/meja/meja_tambah', $data);
        $this->load->view('4_bawah', $data);
    }

    public function meja_simpan(){
            $meja   = $this->input->post('meja');
            $folder = realpath('../assets/foto/meja/');
            $file   = $_FILES['file']['name'];
            
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('meja', 'Meja', 'required');

            if ($this->form_validation->run() == FALSE) {
                $msg_error = array(
                    'meja'      => form_error('meja'),
                );
                
                $has_error = array(
                    'meja'  => 'has-error',
                );
                
                $this->session->set_flashdata('form_error', $msg_error);
                $this->session->set_flashdata('has_error', $has_error);
                redirect('page=meja&act=meja_tambah');
            }else{
                if (!empty($file)) {
                    // Konfigurasi upload gambar
                    $config['upload_path']      = $folder;
                    $config['allowed_types']    = 'jpg|png';
                    $config['max_size']         = '4096';
                    $config['remove_spaces']    = TRUE;
                    $config['file_name']        = 'meja_'.strtolower($meja);
                    $this->load->library('upload', $config);
                    
                    if (!$this->upload->do_upload('file')) {
                        $this->session->set_flashdata('meja', 'Error : <b>' . $this->upload->display_errors() . '</b>.');
                        redirect('page=meja&act=meja_tambah');
                    } else {
                        $f = $this->upload->data();
                        
                        $data = array(
                            'no_meja'  => $meja,
                            'foto'     => $f['orig_name'],
                            'status'   => '0'
                        );
                    }
                }else{
                    $data = array(
                        'no_meja'  => $meja,
                        'status'   => '0'
                    );
                }
                
                
                crud::simpan('tbl_meja',$data);
                $this->session->set_flashdata('meja', '<div class="alert alert-succeded">Data meja sudah disimpan !!!</div>');
                redirect('page=meja&act=meja_tambah');
            }
    }
    
    public function meja_reset(){
//        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $id = $this->encrypt->decode_url($_GET['id']);
            crud::update('tbl_meja','id',$id,array('status'=>'0'));
            
            redirect('page=meja&act=meja_list');
//        } else {
//            $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
//            redirect(site_url());
//        }
    }
    
    public function meja_hapus(){
//        if (akses::aksesLogin() == TRUE OR akses::aksesUser() == TRUE) {
            $id = $this->encrypt->decode_url($_GET['id']);
            crud::delete('tbl_meja','id',$id);
            
            redirect('page=meja&act=meja_list');
//        } else {
//            $this->session->set_flashdata('login', '<div class="alert alert-danger">Maaf, anda session habis. Silahkan login ulang.</div>');
//            redirect(site_url());
//        }
    }
}
