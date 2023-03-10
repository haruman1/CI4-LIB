<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->homeModel = new HomeModel();
        $this->builder = $this->db->table('trendingbook');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            $data = [

                'db' => $this->db,
                'session' => $this->session,
            ];

            return view('/template/awal/header',  $data)
                . view('home/index', $data)
                . view('/template/awal/footer', $data);
        } else {
            return redirect()->to('/admin');
        }
    }
    public function tentangkita()
    {
        $data = [
            'title' => 'About Us',
        ];
        return view('/template/awal/header')
            . view('template/sidebar/nama-halaman')
            . view('home/viewAbout', $data)
            . view('/template/awal/footer', $data);
    }
}
