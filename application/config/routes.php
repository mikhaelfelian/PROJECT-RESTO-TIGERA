<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller']             = "login";
$route['404_override']                   = "";

/*
 | Routing URI Bagian Depan
 | NB : Mohon perhatikan lebih teliti
 */

// Bagian Front
$route['front/login.php']                = "login/front";
$route['front/cek_login.php']            = "login/cek_login";
$route['front']                          = "home/index";
$route['front/index.php']                = "home/index";
$route['front/pengaturan.php']           = "pengaturan";
$route['front/logout.php']               = "login/logout";

// Bagian Meja
$route['pesan/meja.php']                 = "transaksi/trans_meja_set";
$route['pesan/meja_batal.php']           = "transaksi/trans_meja_batal";
$route['pesan/temp_pesan_menu.php']      = "transaksi/temp_cart_set";
$route['pesan/temp_pesan_menu_t.php']    = "transaksi/temp_cart_add_set"; // set menu tambahan
$route['pesan/checkout.php']             = "transaksi/trans_preview";
$route['pesan/set_cust.php']             = "transaksi/temp_cust_set";
$route['pesan/hapus.php']                = "transaksi/hapus";
$route['pesan/proses.php']               = "transaksi/trans_checkout";
$route['pesan/cetak.php']                = "transaksi/cetak";
$route['pesan/detail.php']               = "transaksi/trans_detail";
$route['pesan/simpan_menu_tambahan.php'] = "transaksi/trans_menu_tambahan";
$route['pesan/u_status_order.php']       = "transaksi/trans_u_status";
$route['pesan/kasir.php']                = "transaksi/trans_final";
$route['pesan/simpan_trans_final.php']   = "transaksi/trans_final_save";
$route['pesan/cetak.php']   = "transaksi/cetak";

/* Bagian Depan Selesai */

/*
 | Routing URI Bagian Back Office
 | NB : Perhatikan per Fungsi dalam kontroller 
 */
//$route['admin']                          = "admin/login";
//$route['admin/login.php']                = "admin/login";
//$route['admin/cek_login.php']            = "admin/login_cek";



// Json AutoComplete
$route['json/json_menu_tambahan.json'] = "transaksi/json_menu_tambahan"; // AutoComplete Menu Tambahan


/* End of file routes.php */
/* Location: ./application/config/routes.php */