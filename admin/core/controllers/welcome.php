<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Welcome extends CI_Controller {

    public function index() {        
        $url   = 'https://api.parse.com/1/classes/MenuItem';
//        $url   = 'https://api.parse.com/1/classes/OrderItem';
//        $url   = 'https://api.parse.com/1/classes/Visit';
//        $url   = 'https://api.parse.com/1/users/HRPufP1Va1';
        
        $data = json_decode(service::read($url), TRUE);
//        foreach ($data['results'] as $produk){
//            echo $produk['name'].'<br/>';
//            echo (!empty($produk['description']) ? $produk['description'] : '').'<br/>';
//            echo (!empty($produk['thumbnail']['url']) ? '<img src="'.$produk['thumbnail']['url'].'">' : '').'<br/>';
//            echo '<hr/>';
//        }

        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */