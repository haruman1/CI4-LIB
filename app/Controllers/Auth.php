<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\I18n\Time;
use DateTime;

class Auth extends BaseController
{
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->AuthModel = new AuthModel();
        $this->builder = $this->db->table('User');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        ob_start();
    }
    public function index()
    {
    }
    public function register()
    {
        if ($this->session->get('role') == NULL || $this->session->get('username') == NULL) {


            $active = 1;
            helper('form');

            return view('template/auth/header') . view(
                'auth/viewRegister',
                [
                    'validation' => $this->validation,
                    'session' => $this->session,
                    'title' => 'Register' . $_ENV['app.name'],
                    'waktuHabis' =>  $this->session->waktuhabis = time() - 10,
                ],

            )
                . view('template/auth/footer');
        } else {
            return redirect()->to('/');
        }
    }
    public function save()
    {
        if ($this->session->get('role') == NULL || $this->session->get('username') == NULL) {
            helper('form');

            if ($this->request->getMethod() === 'post') {




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
                        'nama_user' => [
                            'rules' => 'required|min_length[3]|max_length[20]',
                            'errors' => [
                                'required' => 'Nama wajib di isi',
                                'min_length[3]' => 'Nama terlalu pendek',
                                'max_length[20]' => 'Nama terlalu panjang',
                            ],
                        ],

                        'username_user' => [
                            'rules' => 'required|min_length[3]|max_length[20]|is_unique[user.username.id,{id}]',
                            'errors' => [
                                'required' => 'Username wajib di isi',
                                'min_length[3]' => 'Username terlalu pendek',
                                'max_length[20]' => 'Username terlalu panjang',
                                'is_unique' => 'Username sudah ada, silahkan gunakan yang lain',

                            ],
                        ],
                        'password_user' => [
                            'rules' => 'required|trim|min_length[3]',
                            'errors' => [
                                'required' => 'Password wajib di isi',
                                'min_length[3]' => 'Password terlalu pendek',

                            ],
                        ],
                        'confirmation_password' => [
                            'rules' => 'required|trim|min_length[3]|matches[password_user]',
                            'errors' => [
                                'required' => 'Password konfirmasi wajib di isi',
                                'min_length[3]' => 'Password terlalu pendek',
                                'matches' => 'Password tidak sama,tolong samakan password',
                            ],
                        ],
                    ]

                )) {

                    $data['validation'] = $this->validator;
                    $data['session'] = $this->session;
                    $this->session->setTempdata('errorEmail', $this->validation->getError('email_user'), 10);
                    $this->session->setTempdata('errorUsername', $this->validation->getError('username_user'), 10);
                    $this->session->setTempdata('errorNama', $this->validation->getError('nama_user'), 10);
                    $this->session->setTempdata('errorPassword', $this->validation->getError('password_user'), 10);
                    $this->session->setTempdata('errorPasswordConf', $this->validation->getError('confirmation_password'), 10);
                    return view('template/auth/header') . view('auth/viewRegister', [
                        'validation' => $this->validation,
                        'session' => $this->session,
                        'title' => 'Register' . $_ENV['app.name'],
                        'waktuHabis' =>  $this->session->waktuhabis = time() - 10,
                    ], $data)
                        . view('template/auth/footer', $data);
                } else {
                    $data = [

                        'email' => htmlspecialchars($this->request->getVar('email_user')),
                        'username' => htmlspecialchars($this->request->getVar('username_user')),
                        'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_user')),
                        'password' => password_hash($this->request->getVar('password_user'), PASSWORD_DEFAULT),
                        'date_created' => Time::now('Asia/Jakarta', 'id_ID'),
                    ];
                    $this->AuthModel->save($data);
                    $this->session->setTempdata('berhasilDaftar', 'Selamat,akun anda sudah terdaftar, silahkan login ', 10);
                    return redirect()->to('/login');
                    // $this->session->set('errorNama',);

                }
            }
        } else {
            return redirect()->to('/');
        }
    }
    public function login()
    {
        if ($this->session->get('role') == NULL || $this->session->get('username') == NULL) {
            helper('form');
            $data = [
                'title' => 'Register' . $_ENV['app.name'],
            ];
            $this->session->waktuhabis = time() - 10;

            return view('template/auth/header') . view('auth/viewLogin', [
                'validation' => $this->validation,
                'session' => $this->session,
                'title' => 'Register' . $_ENV['app.name'],
                'waktuHabis' => $this->session->waktuhabis,
            ], $data)
                . view('template/auth/footer');
        } else {
            return redirect()->to('/');
        }
    }
    public function loginSave()
    {
        if ($this->session->get('role') == NULL || $this->session->get('username') == NULL) {
            if (!$this->validate(
                [
                    'login_username' => [
                        'rules' => 'required|min_length[3]',
                        'errors' => [
                            'required' => 'Email wajib di isi',
                            'min_length[3]' => 'Email terlalu pendek',

                        ],
                    ],



                    'login_password' => [
                        'rules' => 'required|trim',
                        'errors' => [
                            'required' => 'Password wajib di isi',


                        ],
                    ],

                ]

            )) {
                helper('form');

                $data = [
                    'title' => 'Register' . $_ENV['app.name'],
                ];
                $this->session->waktuhabis = time() - 10;
                $this->session->setTempdata('errorUsername', $this->validation->getError('login_username'), 10);
                $this->session->setTempdata('errorPassword', $this->validation->getError('login_password'), 10);
                return view('template/auth/header') . view('auth/viewLogin', [
                    'validation' => $this->validation,
                    'session' => $this->session,
                    'title' => 'Register' . $_ENV['app.name'],
                    'waktuHabis' => $this->session->waktuhabis,
                ], $data)
                    . view('template/auth/footer');
            } else {
                $username = $this->request->getVar('login_username');

                $password = $this->request->getVar('login_password');
                $cek = $this->AuthModel->where('username', $username)->first();
                if ($cek) {
                    $passwordHash = $cek['password'];
                    if (password_verify($password, $passwordHash)) {
                        $data = [
                            'username' => $cek['username'],
                            'id_user' => $cek['id_user'],
                            'nama_lengkap' => $cek['nama_lengkap'],
                            'role' => $cek['role'],
                        ];
                        $this->session->set($data);
                        return redirect()->to('/');
                    } else {
                        $this->session->setTempdata('errorPassword', 'Password salah', 10);

                        return redirect()->to('/login');
                    }
                } else {
                    $this->session->setTempdata('errorUsername', 'Username tidak terdaftar', 10);
                    return redirect()->to('/login');
                }
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $this->session->destroy();


        unset($_SESSION['username']);
        // or multiple values:
        unset(
            $_SESSION['nama_lengkap'],
            $_SESSION['role']
        );
        $this->session->setTempdata('berhasilDaftar', 'Anda sudah logout, Silahkan Login Kembali', 10);
        return redirect()->to('/login');
    }
}
