<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SemuaTriggerModel;

class SemuaTrigger extends BaseController
{
    public function __construct()
    {
        $this->sModel = new SemuaTriggerModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Semua Trigger',

        ];
        return view('trigger/index', $data);
    }
    public function log_delete_user()
    {
        if ($this->sModel->log_delete_user() == TRUE) {
            $data = [
                'pesan' => 'Berhasil menambahkan log_delete_user',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $anu = $this->db->error();
            $data = [
                'pesan' => 'Gagal menambahkan log_delete_user',
                'error' =>  $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function log_update_user()
    {
        if ($this->sModel->log_update_user() == TRUE) {
            $data = [
                'pesan' => 'Berhasil menambahkan log_update_user',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan log_update_user',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function TriggerInsertUser()
    {
        if ($this->sModel->log_insert_user() == TRUE) {
            $data = [
                'pesan' => 'Berhasil menambahkan log insert user',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan log insert user',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function transaksi_insert_Trigger()
    {
        if ($this->sModel->transaksi_insert() == TRUE) {
            $data = [
                'pesan' => 'Berhasil menambahkan log insert user',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan log insert user',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function procedureCreateUser()
    {
        if ($this->sModel->procedureCreateUser() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan procedure create user',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan procedureCreateUser',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function trigger_hapus_buku()
    {

        if ($this->sModel->trigger_hapus_buku() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan trigger_hapus_buku',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan trigger_hapus_buku',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function trigger_penambahan_buku()
    {

        if ($this->sModel->trigger_penambahan_buku() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan trigger_penambahan_buku',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan trigger_penambahan_buku',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function trigger_perubahan_buku()
    {

        if ($this->sModel->trigger_perubahan_buku() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan trigger_perubahan_buku',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan trigger_perubahan_buku',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function update_jumlah_peminjaman()
    {

        if ($this->sModel->update_jumlah_peminjaman() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan update_jumlah_peminjaman',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan update_jumlah_peminjaman',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function update_stok_pengembalian()
    {

        if ($this->sModel->update_stok_pengembalian() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan update_stok_pengembalian',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan update_stok_pengembalian',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
    public function viewTrendingbook()
    {

        if ($this->sModel->viewTrendingbook() == true) {
            $data = [
                'pesan' => 'Berhasil menambahkan viewTrendingbook',
            ];
            return view('trigger/berhasil', $data);
        } else {
            $data = [
                'pesan' => 'Gagal menambahkan viewTrendingbook',
                'error' => $this->db->error(),

            ];
            return view('trigger/gagal', $data);
        }
    }
}
