<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Files\File;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->adminModel = new \App\Models\AdminModel();
        $this->adminBookModel = new \App\Models\AdminBookModel();
        $this->builder = $this->db->table('user');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
    }
    public function index()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => 'Admin',
                'db' => $this->db,
                'request' => $this->request,
                'session' => $this->session,
            ];
            return view('/template/admin/header', $data)
                . view('admin/index', $data);
        }
    }
    public function anggota()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => 'Admin',
                'db' => $this->db,
                'request' => $this->request,
                'session' => $this->session,
            ];
            return view('/template/admin/header', $data)
                . view('admin/kelolaanggota', $data);
        }
    }
    public function buku()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => 'Admin',
                'db' => $this->db,
                'request' => $this->request,
                'session' => $this->session,
            ];
            return view('/template/admin/header', $data)
                . view('admin/kelolabuku', $data);
        }
    }
    public function transaksi()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            $data = [
                'title' => 'Admin',
                'db' => $this->db,
                'request' => $this->request,
                'session' => $this->session,
            ];
            return view('/template/admin/header', $data)
                . view('admin/transaksi', $data);
        }
    }
    public function tambahAnggota()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            if (!$this->validate(
                [
                    'email_user' => [
                        'rules' => 'required|min_length[3]|is_unique[user.email.id,{id}]',
                        'errors' => [
                            'required' => 'Email wajib di isi',
                            'min_length[3]' => 'Email terlalu pendek',
                            'is_unique' => 'Email sudah ada,silahkan gunakan yang lain',
                        ],
                    ],
                    'nama' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Nama wajib di isi',
                            'min_length[3]' => 'Nama terlalu pendek',
                            'max_length[20]' => 'Nama terlalu panjang',
                        ],
                    ],

                    'username' => [
                        'rules' => 'required|min_length[3]|max_length[20]|is_unique[user.username.id,{id}]',
                        'errors' => [
                            'required' => 'Username wajib di isi',
                            'min_length[3]' => 'Username terlalu pendek',
                            'max_length[20]' => 'Username terlalu panjang',
                            'is_unique' => 'Username sudah ada, silahkan gunakan yang lain',

                        ],
                    ],
                    'password' => [
                        'rules' => 'required|trim|min_length[8]',
                        'errors' => [
                            'required' => 'Password wajib di isi',
                            'min_length[8]' => 'Password terlalu pendek',

                        ],
                    ],
                    'password_sama' => [
                        'rules' => 'required|trim|min_length[8]|matches[password]',
                        'errors' => [
                            'required' => 'Password konfirmasi wajib di isi',
                            'min_length[8]' => 'Password terlalu pendek',
                            'matches' => 'Password tidak sama,tolong samakan password',
                        ],
                    ],
                ]

            )) {
                $this->session->setTempdata(' Emailerror', $this->validation->getError('email_user'), 10);
                $this->session->setTempdata('Usernamerror', $this->validation->getError('username'), 10);
                $this->session->setTempdata('Namaerror', $this->validation->getError('nama'), 10);
                $this->session->setTempdata('Passworderror', $this->validation->getError('password'), 10);
                $this->session->setTempdata('PasswordConferror', $this->validation->getError('password_sama'), 10);

                return view('/template/admin/header')
                    . view('admin/kelolaanggota', [
                        'validation' => $this->validation,
                        'session' => $this->session,
                        'title' => 'Register' . $_ENV['app.name'],
                        'db' => $this->db,
                    ]);
            } else {
                $this->adminModel->save([
                    'email' => $this->request->getVar('email_user'),
                    'nama_lengkap' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'role' => 2,
                    'is_active' => 1,
                    'date_created' => date('Y-m-d H:i:s'),

                ]);
                $this->session->setTempdata('pesanBerhasil', 'Berhasil Menambahkan User Baru', 10);
                return redirect()->to('/admin/anggota');
            }
        }
    }
    public function editUser()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            $id = $this->request->getVar('id_user');
            $check_id =  $this->builder->where('id_user', $id);

            if ($this->adminModel->Find($id) == TRUE) {
                if (!$this->validate(
                    [
                        'edit_email_user' => [
                            'rules' => 'required|min_length[3]|is_unique[user.email.id,{id}]',
                            'errors' => [
                                'required' => 'Email wajib di isi',
                                'min_length[3]' => 'Email terlalu pendek',
                                'is_unique' => 'Email sudah ada,silahkan gunakan yang lain',
                            ],
                        ],
                        'edit_nama' => [
                            'rules' => 'required|min_length[3]|max_length[20]',
                            'errors' => [
                                'required' => 'Nama wajib di isi',
                                'min_length[3]' => 'Nama terlalu pendek',
                                'max_length[20]' => 'Nama terlalu panjang',
                            ],
                        ],

                        'edit_username' => [
                            'rules' => 'required|min_length[3]|max_length[20]|is_unique[user.username.id,{id}]',
                            'errors' => [
                                'required' => 'Username wajib di isi',
                                'min_length[3]' => 'Username terlalu pendek',
                                'max_length[20]' => 'Username terlalu panjang',
                                'is_unique' => 'Username sudah ada, silahkan gunakan yang lain',

                            ],
                        ],
                        'edit_password' => [
                            'rules' => 'required|trim|min_length[8]',
                            'errors' => [
                                'required' => 'Password wajib di isi',
                                'min_length[8]' => 'Password terlalu pendek',

                            ],
                        ],
                        'edit_password_sama' => [
                            'rules' => 'required|trim|min_length[8]|matches[password]',
                            'errors' => [
                                'required' => 'Password konfirmasi wajib di isi',
                                'min_length[8]' => 'Password terlalu pendek',
                                'matches' => 'Password tidak sama,tolong samakan password',
                            ],
                        ],
                        'edit_role' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'Role wajib di isi',

                            ],
                        ],
                        'edit_apakah_active' => [
                            'rules' => 'required',
                            'errors' => [
                                'required' => 'is active wajib di isi',

                            ],
                        ],
                    ]

                )) {

                    $this->session->setTempdata('Emailedit', $this->validation->getError('edit_email_user'), 10);
                    $this->session->setTempdata('Usernamedit', $this->validation->getError('edit_username'), 10);
                    $this->session->setTempdata('Namaedit', $this->validation->getError('edit_nama'), 10);
                    $this->session->setTempdata('Passwordedit', $this->validation->getError('edit_password'), 10);
                    $this->session->setTempdata('roleError', $this->validation->getError('edit_role'), 10);
                    $this->session->setTempdata('isactiveError', $this->validation->getError('edit_apakah_active'), 10);

                    return view('/template/admin/header')
                        . view('admin/kelolaanggota', [
                            'validation' => $this->validation,
                            'session' => $this->session,
                            'title' => 'Register' . $_ENV['app.name'],
                            'db' => $this->db,
                        ]);
                    $this->session->setTempdata('pesanGagal', 'Gagal Edit User', 10);
                    return redirect()->to('/admin/anggota');
                } else {
                    $this->adminModel->update($id, [
                        'email' => $this->request->getVar('edit_email_user'),
                        'nama_lengkap' => $this->request->getVar('edit_nama'),
                        'username' => $this->request->getVar('edit_username'),
                        'password' => password_hash($this->request->getVar('edit_password'), PASSWORD_DEFAULT),
                        'role' => $this->request->getVar('edit_role'),
                        'is_active' => $this->request->getVar('edit_apakah_active'),

                    ]);
                    $this->session->setTempdata('pesanBerhasil', 'Berhasil Edit User', 10);
                    return redirect()->to('/admin/anggota');
                }
            } else {
                $this->session->setTempdata('pesanGagal', 'Gagal Edit User', 10);
                return redirect()->to('/admin/anggota');
            }
        }
    }
    public function deleteUser()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            $id = $this->request->getVar('id_user');
            if ($this->request->getVar('id_user')) {
                $this->session->setTempdata('pesanBerhasil', 'Berhasil Menghapus data', 10);
                $this->adminModel->delete($id);
                return redirect()->to('/admin/anggota');
            } else {
                $this->session->setTempdata('pesanGagal', 'Gagal Menghapus data', 10);
                return redirect()->to('/admin/anggota');
            }
        }
    }
    public function tambahBuku()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            if (!$this->validate(
                [
                    'id_buku' => [
                        'rules' => 'required|min_length[3]|max_length[10]',
                        'errors' => [
                            'required' => 'ID Buku wajib di isi',
                            'min_length[3]' => 'ID terlalu pendek',
                            'max_length[10]' => 'ID terlalu panjang',
                        ],
                    ],
                    'judulbuku' => [
                        'rules' => 'required|min_length[3]',
                        'errors' => [
                            'required' => 'Judul Buku wajib di isi',
                            'min_length[3]' => 'Judul Buku terlalu pendek',
                        ],
                    ],

                    'kategori' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Kategori wajib di isi',
                            'min_length[3]' => 'Kategori terlalu pendek',
                            'max_length[20]' => 'Kategori terlalu panjang',

                        ],
                    ],
                    'author' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Author wajib di isi',
                            'min_length[3]' => 'Author terlalu pendek',
                            'max_length[20]' => 'Author terlalu panjang',

                        ],
                    ],
                    'stok' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Stok wajib di isi',
                            'min_length[3]' => 'Stok terlalu pendek',
                            'max_length[20]' => 'Stok terlalu panjang',

                        ],
                    ],
                    'cover_buku' => [
                        'rules' => 'uploaded[cover_buku]|is_image[cover_buku]|mime_in[cover_buku,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'errors' => [
                            'uploaded' => 'Harus Ada File yang diupload',
                            'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png'
                            
                        ]
                        
                    ],
                    'file_buku' => [
                        'rules' => 'uploaded[file_buku]'
                        . '|mime_in[file_buku,pdf]',
                        
                    ],
                ]

            )) {
                $this->session->setTempdata('Iderror', $this->validation->getError('id_buku'), 10);
                $this->session->setTempdata('Judulerror', $this->validation->getError('judulbuku'), 10);
                $this->session->setTempdata('Kategorierror', $this->validation->getError('kategoribuku'), 10);
                $this->session->setTempdata('Authorerror', $this->validation->getError('author'), 10);
                $this->session->setTempdata('Stokerror', $this->validation->getError('stok'), 10);
                $this->session->setTempdata('Covererror', $this->validation->getError('cover_buku'), 10);
                $this->session->setTempdata('Fileerror', $this->validation->getError('file_buku'), 10);

                return view('/template/admin/header')
                    . view('admin/kelolabuku', [
                        'validation' => $this->validation,
                        'session' => $this->session,
                        'title' => 'Register' . $_ENV['app.name'],
                        'db' => $this->db,
                    ]);
            } else {
                $this->adminBookModel->save([
                    'id' => $this->request->getVar('id_buku'),
                    'judul' => $this->request->getVar('judulbuku'),
                    'kategori' => $this->request->getVar('kategoribuku'),
                    'author' => $this->request->getVar('author'),
                    'stok' => $this->request->getVar('stok'),
                ]);

                
                $img = $this->request->getFile('cover_buku');
                $file = $this->request->getFile('file_buku');

                if (! $img->hasMoved() && $file->hasMoved()) {
                    $imagepath = WRITEPATH . 'uploads/' . $img->store();
                    $filepath = WRITEPATH . 'uploads/' . $file->store();
        
                    $data = ['uploaded_imageinfo' => new File($imagepath)];
        
                    $this->session->setTempdata('pesanBerhasil', 'Berhasil Menambahkan Buku Baru', 10);
                    return view('/admin/buku', $data);
                }
                $data = ['errors' => 'The file has already been moved.'];
        

                return redirect()->to('/admin/buku');
            }
        }
    }
    public function editBuku()
    {
        if ($this->session->get('role') == 2 || $this->session->get('role') == NULL) {
            return redirect()->to('/');
        } else {
            if (!$this->validate(
                [
                    'id_buku' => [
                        'rules' => 'required|min_length[3]|is_unique[user.email.id,{id}]',
                        'errors' => [
                            'required' => 'Email wajib di isi',
                            'min_length[3]' => 'Email terlalu pendek',
                            'is_unique' => 'Email sudah ada,silahkan gunakan yang lain',
                        ],
                    ],
                    'judulbuku' => [
                        'rules' => 'required|min_length[3]',
                        'errors' => [
                            'required' => 'Judul Buku wajib di isi',
                            'min_length[3]' => 'Judul Buku terlalu pendek',
                        ],
                    ],

                    'kategori' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Kategori wajib di isi',
                            'min_length[3]' => 'Kategori terlalu pendek',
                            'max_length[20]' => 'Kategori terlalu panjang',

                        ],
                    ],
                    'author' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Author wajib di isi',
                            'min_length[3]' => 'Author terlalu pendek',
                            'max_length[20]' => 'Author terlalu panjang',

                        ],
                    ],
                    'stok' => [
                        'rules' => 'required|min_length[3]|max_length[20]',
                        'errors' => [
                            'required' => 'Stok wajib di isi',
                            'min_length[3]' => 'Stok terlalu pendek',
                            'max_length[20]' => 'Stok terlalu panjang',

                        ],
                    ],
                    'cover_buku' => [
                        'rules' => 'uploaded[cover_buku]|is_image[cover_buku]|mime_in[cover_buku,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                        'errors' => [
                            'uploaded' => 'Harus Ada File yang diupload',
                            'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png'
                            
                        ]
                        
                    ],
                    'file_buku' => [
                        'rules' => 'uploaded[file_buku]'
                        . '|mime_in[file_buku,pdf]',
                        
                    ],
                ]

            )) {
                $this->session->setTempdata('Iderror', $this->validation->getError('id_buku'), 10);
                $this->session->setTempdata('Judulerror', $this->validation->getError('judulbuku'), 10);
                $this->session->setTempdata('Kategorierror', $this->validation->getError('kategoribuku'), 10);
                $this->session->setTempdata('Authorerror', $this->validation->getError('author'), 10);
                $this->session->setTempdata('Stokerror', $this->validation->getError('stok'), 10);
                $this->session->setTempdata('Covererror', $this->validation->getError('cover_buku'), 10);
                $this->session->setTempdata('Fileerror', $this->validation->getError('file_buku'), 10);

                return view('/template/admin/header')
                    . view('admin/kelolabuku', [
                        'validation' => $this->validation,
                        'session' => $this->session,
                        'title' => 'Register' . $_ENV['app.name'],
                        'db' => $this->db,
                    ]);
            } else {
                $this->adminBookModel->save([
                    'id' => $this->request->getVar('id_buku'),
                    'judul' => $this->request->getVar('judulbuku'),
                    'kategori' => $this->request->getVar('kategoribuku'),
                    'author' => $this->request->getVar('author'),
                    'stok' => $this->request->getVar('stok'),
                ]);

                
                $img = $this->request->getFile('cover_buku');
                $file = $this->request->getFile('file_buku');

                if (! $img->hasMoved() && $file->hasMoved()) {
                    $imagepath = WRITEPATH . 'uploads/' . $img->store();
                    $filepath = WRITEPATH . 'uploads/' . $file->store();
        
                    $data = ['uploaded_imageinfo' => new File($imagepath)];
        
                    $this->session->setTempdata('pesanBerhasil', 'Berhasil Menambahkan Buku Baru', 10);
                    return view('/admin/buku', $data);
                }
                $data = ['errors' => 'The file has already been moved.'];
        

                return redirect()->to('/admin/buku');
            }
        }
    }
}
