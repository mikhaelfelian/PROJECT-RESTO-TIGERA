<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of jabatan
 *
 * @author AO
 */
class general extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function status_meja($status) {
        switch ($status) {
            case '0':
                $status = 'Kosong';
                break;

            case '1':
                $status = 'Terpakai';
                break;
            case 'inactive':
                $status = 'Kosong';
                break;

            case 'active':
                $status = 'Terpakai';
                break;
        }
        return $status;
    }
    
    function status_order($status) {
        switch ($status) {
            case 'confirm':
                $status = 'Konfirm';
                break;

            case 'complete':
                $status = 'Lengkap';
                break;

            case 'batal':
                $status = 'Batal';
                break;
        }
        return $status;
    }
    
    function status_resto($status) {
        switch ($status) {
            case '1':
                $status = 'Makan di tempat';
                break;

            case '2':
                $status = 'Bungkus / Packing';
                break;
        }
        return $status;
    }
    
    function status_byr($status) {
        switch ($status) {
            case 'paid':
                $status = 'Lunas';
                break;

            case 'unpaid':
                $status = 'Belum Bayar';
                break;
        }
        return $status;
    }
        
    function no_nota($tabel_nama, $tabel_kolom) {
        $pengaturan = $this->db->query("SELECT * FROM tbl_pengaturan")->row();
        $kode       = $this->db->query("SELECT MAX(no_nota) as no_nota FROM tbl_orderlist")->row();
        $char       = $pengaturan->string_nota."."; // Total String Nota
        $pjg_char   = strlen($char); // Itung panjang Notanya
        $noUrut     = (int) substr($kode->no_nota, $pjg_char, 5); // Incriment Numbering nota
        $noUrut++;
        
        $IDbaru     = $char . sprintf("%05s", $noUrut);        
        return $IDbaru;
    }
        
    function tax($price) {
        $tax_percentage = $this->db->query("SELECT ppn FROM tbl_pengaturan")->row();
        $tax_amount     = ($tax_percentage->ppn / 100) * $price;
        
        return $tax_amount;
    }
    
    function totalamount($price) {
        $tax_percentage = $this->db->query("SELECT ppn FROM tbl_pengaturan")->row();
        $tax_amount     = ($tax_percentage->ppn / 100) * $price;
        $tot_amount      =$tax_amount+$price;
        
        return $tot_amount;
    }
    
    function enkrip($string) {
        $rumus = $this->encrypt->encode_url($string);        
        return $rumus;
    }
    
    function dekrip($string) {
        $rumus = $this->encrypt->encode_url($string);        
        return $rumus;
    }
    
    function format_angka_pendek($string) {
        if ($string > 1000000000000) {
            $tot = round($string / 1000000000000, 1) . ' T';
        } elseif ($string > 1000000000) {
            $tot = round($string / 1000000000, 1) . ' B';
        } elseif ($string > 1000000) {
            $tot = round($string / 1000000, 1) . ' M';
        } elseif ($string > 1000) {
            $tot = round($string / 1000, 1) . ' K';
        } else {
            $tot = $string;
        }
        
        return $tot;
    }
    
    function trans_omz_hari_ini() {
        $query = $this->db->query("SELECT SUM(jml_gtotal)as total_omzet FROM tbl_orderlist WHERE DATE(tgl)='".date('Y-m-d')."'")->row();
        $hasil = $query->total_omzet;
        return $hasil;
    }
    
    function trans_tot_hari_ini() {
        $query = $this->db->query("SELECT no_nota FROM tbl_orderlist WHERE DATE(tgl)='".date('Y-m-d')."'")->num_rows();
        $hasil = $query;
        return $hasil;
    }
    
}