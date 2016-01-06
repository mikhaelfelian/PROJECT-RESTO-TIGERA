<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class akses extends CI_Model {
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
    function cek_login($user,$pass)
    {
        $this->db->select('*');
        $this->db->where('username', $user);
        $this->db->where('password', $pass);
        $sql = $this->db->get('tbl_user');
        if ($sql->num_rows() == 1) {
            foreach ($sql->result() as $row) {
                $data = $row;
            }
            return $data;
        } else {
            return FALSE;
        }
    }
    
    function aksesLogin()
    {
        $auth = $this->session->userdata('login');
        if($auth['is_logged_in'] == TRUE):
            return TRUE;
        else:
            return FALSE;
        endif;
    }
}
