<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\IsiDatabaseModel;

class IsiDatabase extends BaseController
{
    public function __construct()
    {
        $this->iModel = new IsiDatabaseModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('user');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
    }
    public function index()
    {


        $data = [
            'title' => 'Semua isi database ada disini',

        ];
        return view('database/index', $data);
    }
    public function hlmnbuku()
    {
        if ($this->iModel->hlmnbuku() == TRUE) {
            $data = [
                'pesan' => 'Berhasil menambahkan database halaman buku',
            ];
            return view('database/berhasil', $data);
        } else {
            $anu = $this->db->error();
            $data = [
                'pesan' => 'Gagal menambahkan halaman buku',
                'error' =>  $this->db->error(),

            ];
            return view('database/gagal', $data);
        }
    }
    public function bukutersedia()
    {
        if ($this->iModel->bukutersedia() == TRUE) {
            $data = [
                'pesan' => 'Berhasil menambahkan database bukutersedia',
            ];
            return view('database/berhasil', $data);
        } else {
            $anu = $this->db->error();
            $data = [
                'pesan' => 'Gagal menambahkan bukutersedia',
                'error' =>  $this->db->error(),
                ''

            ];
            return view('database/gagal', $data);
        }
    }
}
