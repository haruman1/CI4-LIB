<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->cModel = new CategoryModel();
        $this->builder = $this->db->table('hlmnbuku');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
    }
    public function index()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {


            $data = [
                'title' => 'Category',
                'db' => $this->db,
                'category' => $this->db->table('hlmnbuku')->get()->getResultArray(),
                'session' => $this->session,
                // 'kategori_buku' => $this->db->table('hlmnbuku')->get()->getResultArray()->like('kategoribuku', 'Fiction'),
            ];
            return view('/template/awal/header', $data)
                . view('template/sidebar/nama-halaman')
                . view('kategori/index', $data)
                . view('/template/awal/footer', $data);
        } else {
            return redirect()->to('/admin');
        }
    }
    public function pinjam_buku()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            $data = [
                'title' => 'Pinjam Buku',
                'db' => $this->db,
                'builder' => $this->builder,
                'session' => $this->session,
                'request' => $this->request,
            ];
            return view('/template/awal/header')
                . view('template/sidebar/nama-halaman')
                . view('template/sidebar/search-halaman')
                . view('kategori/cadangan', $data)
                . view('/template/awal/footer', $data);
        } else {
            $this->session->setTempdata('berhasilDaftar', 'Maaf, akun kamu tidak bisa meminjam buku ', 10);
            return redirect()->to('/admin');
        }
    }
    public function savePinjam()
    {
        if ($this->session->get('role') == 2) {
            if (!$this->validate(
                [
                    'id_buku' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'id Buku di isi',
                        ],
                    ],
                    'judulbuku' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Judul Buku wajib di isi',

                        ],
                    ],

                    'file_buku' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'File Buku wajib di isi',

                        ],
                    ],

                    'tanggal_peminjaman' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tanggal Peminjaman wajib di isi',


                        ],
                    ],
                    'tanggal_pengembalian' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tanggal pengembalian wajib di isi',


                        ],
                    ],

                ]

            )) {
                $this->session->setTempdata('errorId', $this->validation->getError('id_buku'), 10);
                $this->session->setTempdata('errorAuthor', $this->validation->getError('author'), 10);
                $this->session->setTempdata('errorJudul', $this->validation->getError('judulbuku'), 10);
                $this->session->setTempdata('errorFile', $this->validation->getError('file_buku'), 10);
                $this->session->setTempdata('errorPinjam', $this->validation->getError('tanggal_peminjaman'), 10);
                $this->session->setTempdata('errorPengembalian', $this->validation->getError('tanggal_pengembalian'), 10);

                $data = [
                    'title' => 'Pinjam Buku',
                    'db' => $this->db,
                    'session' => $this->session,
                    'request' => $this->request,
                    'validation' => $this->validation,
                ];
                return redirect()->to(base_url('/category/borrow/?id_buku=' . $this->request->getVar('id_buku')));
                $this->session->setTempdata('pesanBuku', 'Buku berhasil di pinjam', 10);
            } else {
                $data = [
                    'id_buku' => $this->request->getVar('id_buku'),
                    'id_user' => $this->session->get('id_user'),
                    'judulbuku' => $this->request->getVar('judulbuku'),
                    'tanggal_peminjaman' => $this->request->getVar('tanggal_peminjaman'),
                    'tanggal_pengembalian' => $this->request->getVar('tanggal_pengembalian'),
                    'file_buku' => $this->request->getVar('file_buku'),

                ];
                $this->cModel->save($data);
                $this->session->setTempdata('pesanBuku', 'Buku berhasil di pinjam', 10);
                return redirect()->to(base_url('/category/mybook'));
            }
        } else {
            $this->session->setTempdata('pesanBuku', 'Maaf, akun kamu tidak bisa meminjam buku ', 10);
            return redirect()->to('/');
        }
    }
    public function search()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {

            $keyword = $this->request->getVar('keyword');
            $data = [
                'title' => 'Category',
                'db' => $this->db,
                // 'category' => $this->db->table('hlmnbuku')->like('judulbuku', $keyword)->get()->getResultArray(),
                'session' => $this->session,
                'request' => $this->request,
            ];
            $this->session->setTempdata('pesanError', 'Silahkan isi kolom pencarian terlebih dahulu!', 10);
            return view('/template/awal/header')
                . view('template/sidebar/nama-halaman', $data)

                . view('kategori/pencarian', $data)
                . view('/template/awal/footer', $data);
        } else {
            return redirect()->to('/admin');
        }
    }

    public function search_buku()
    {
        $keyword = $this->request->getVar('keyword');
        $data = [
            'title' => 'Category',
            'db' => $this->db,
            'category' => $this->db->table('hlmnbuku')->like('judulbuku', $keyword)->get()->getResultArray(),
            'request' => $this->request,
        ];
        return view('/template/awal/header')
            . view('template/sidebar/nama-halaman', $data)

            . view('kategori/pencarian', $data)
            . view('/template/awal/footer', $data);
    }
    public function search_buku_saya()
    {
        $keyword = $this->request->getVar('keyword');
        $data = [
            'title' => 'Category',
            'db' => $this->db,
            'category' => $this->db->table('hlmnbuku')->like('judulbuku', $keyword)->get()->getResultArray(),
            'request' => $this->request,
        ];
        return view('/template/awal/header')
            . view('template/sidebar/nama-halaman', $data)

            . view('kategori/pencarian', $data)
            . view('/template/awal/footer', $data);
    }
    public function search_buku_pinjam()
    {
        $keyword = $this->request->getVar('keyword');
        $data = [
            'title' => 'Category',
            'db' => $this->db,
            'category' => $this->db->table('hlmnbuku')->like('judulbuku', $keyword)->get()->getResultArray(),
            'request' => $this->request,
        ];
        return view('/template/awal/header')
            . view('template/sidebar/nama-halaman', $data)

            . view('kategori/pencarian', $data)
            . view('/template/awal/footer');
    }
    //     public function search_buku_pinjam_saya()
    //     {
    //         $keyword = $this->request->getVar('keyword');
    //         $data = [
    //             'title' => 'Category',
    //             'db' => $this->db,
    //             'category' => $this->db->table('hlmnbuku')->like('judulbuku', $
    // }
    public function buku_saya()
    {
        if ($this->session->get('role') == 2) {
            $data = [
                'title' => 'Buku Saya',
                'db' => $this->db,
                'request' => $this->request,
                'session' => $this->session,
            ];
            return view('/template/awal/header')
                . view('template/sidebar/nama-halaman')
                . view('template/sidebar/search-halaman')
                . view('kategori/viewbukuSaya', $data)
                . view('/template/awal/footer');
        } else if ($this->session->get('role') == 1) {
            return redirect()->to('/admin');
        } else {
            $this->session->setTempdata('berhasilDaftar', 'Silahkan Login terlebih dahulu untuk kehalaman ini ', 1);
            return redirect()->to('/login');
        }
    }
}
