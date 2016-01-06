<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

/**
 * Description of users
 *
 * @author mike
 */
class users extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    public function users_list(){
//        $url   = 'https://api.parse.com/1/users';
        $data['user_list'] = ''; //json_decode(service::read($url), TRUE);

        $this->load->view('1_atas', $data);
        $this->load->view('2_navbar', $data);
        $this->load->view('includes/user/user_list', $data);
        $this->load->view('4_bawah', $data);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
    }
}
