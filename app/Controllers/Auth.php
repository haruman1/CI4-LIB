<?php

namespace App\Controllers;

require './vendor/autoload.php';

use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Config\Services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use PhpParser\Node\Stmt\Else_;

class Auth extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->kirimemail = new PHPMailer();
        $this->db = \Config\Database::connect();
        $this->AuthModel = new AuthModel();
        $this->request = \Config\Services::request();
        $this->builder = $this->db->table('daftaruser');
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        // $this->request = Services::request();

        ob_start();
    }
    public function index()
    {
        // 'nama_kamu' => session login user
        // 'role_kamu' => session login user
        if ($this->session->get('nama_kamu') == NULL || $this->session->get('role_kamu') == NULL) {


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

    public function randomNumber()
    {
        $randomNumber = rand(100000, 999999);
        return $randomNumber;
    }
    public function save()
    {
        //role_kamu buat sesi jika dia login

        if ($this->session->get('role_kamu') == NULL || $this->session->get('nama_kamu') == NULL) {
            helper('form');

            if ($this->request->getMethod() === 'post') {




                if (!$this->validate(
                    [
                        'register_nama' => [
                            'rules' => 'required|min_length[3]|max_length[20]',
                            'errors' => [
                                'required' => 'Nama wajib di isi',
                                'min_length[3]' => 'Nama terlalu pendek',
                                'max_length[25]' => 'Nama terlalu panjang',
                            ],
                        ],
                        'register_email' => [
                            'rules' => 'required|min_length[3]|is_unique[daftaruser.mail_user.id,{id}]',
                            'errors' => [
                                'required' => 'Email wajib di isi',
                                'min_length[3]' => 'Email terlalu pendek',
                                'is_unique' => 'Email sudah ada,silahkan gunakan yang lain',
                            ],
                        ],


                        'register_username' => [
                            'rules' => 'required|min_length[3]|max_length[20]|is_unique[daftaruser.username_user.id,{id}]',
                            'errors' => [
                                'required' => 'Username wajib di isi',
                                'min_length[3]' => 'Username terlalu pendek',
                                'max_length[20]' => 'Username terlalu panjang',
                                'is_unique' => 'Username sudah ada, silahkan gunakan yang lain',

                            ],
                        ],
                        'register_password' => [
                            'rules' => 'required|trim|min_length[3]',
                            'errors' => [
                                'required' => 'Password wajib di isi',
                                'min_length[3]' => 'Password terlalu pendek',

                            ],
                        ],
                        'register_confirmation_password' => [
                            'rules' => 'required|trim|min_length[3]|matches[register_password]',
                            'errors' => [
                                'required' => 'Password konfirmasi wajib di isi',
                                'min_length[3]' => 'Password terlalu pendek',
                                'matches' => 'Password tidak sama,tolong samakan password yang dibuat dengan password konfirmasi',
                            ],
                        ],
                    ]

                )) {

                    $data['validation'] = $this->validator;
                    $data['session'] = $this->session;


                    $this->session->setTempdata('errorNama', $this->validation->getError('register_nama'), 1);

                    $this->session->setTempdata('errorEmail', $this->validation->getError('register_email'), 1);


                    $this->session->setTempdata('errorUsername', $this->validation->getError('register_username'), 1);








                    $this->session->setTempdata(
                        'errorPassword',
                        $this->validation->getError('register_password'),
                        1
                    );


                    $this->session->setTempdata('errorPasswordConf', $this->validation->getError('register_confirmation_password'), 10);


                    return view('template/auth/header') . view('auth/viewRegister', [
                        'validation' => $this->validation,
                        'session' => $this->session,
                        'title' => 'Register' . $_ENV['app.name'],

                    ], $data)
                        . view('template/auth/footer', $data);
                } else {
                    $data = [

                        'nama_lengkap_user' => htmlspecialchars(htmlentities($this->request->getVar('register_nama'))),

                        'username_user' => htmlspecialchars(htmlentities($this->request->getVar('register_username'))),

                        'mail_user' => htmlspecialchars(strip_tags($this->request->getVar('register_email'))),

                        'password_user' => password_hash($this->request->getVar('register_password'), PASSWORD_DEFAULT),

                    ];
                    $this->testEmail($data['mail_user']);
                    $this->AuthModel->save($data);
                    $this->session->setTempdata('berhasilDaftar', 'Selamat,akun anda sudah terdaftar, silahkan login ', 10);
                    return redirect()->to('/login');
                    // $this->session->set('errorNama',);

                }
            }
        } else if (strtolower($this->request->getMethod()) !== 'post') {
            return $this->response->setStatusCode(405)->setBody('Method Not Allowed');
        } else {
            return redirect()->to('/');
        }
    }

    public function testEmail($email_kamu)
    {

        //Import PHPMailer classes into the global namespace
        //These must be at the top of your script, not inside a function
        $mail = new PHPMailer(true);
        try {
            $mail->IsSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
            $mail->Port = $_ENV['email.port'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->Host = $_ENV['email.host'];

            //username dan password
            $mail->Username = $_ENV['email.username'];
            $mail->Password = $_ENV['email.password'];


            //recipients
            $mail->addAddress($email_kamu);     //Add a recipient
            $mail->addReplyTo('admin@lover.com', 'Admin');
            $mail->setFrom('noreply-elib@gmail.com', "noreply-elib@gmail.com");
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = "Verifikasi Email";
            $mail->Body    = 'Klik link ini untuk verifikasi email anda website ' . $_ENV['app.name'] . '   <a href="' . $_ENV['app.baseURL'] . 'verifikasiEmail?email-kamu=' . $email_kamu . '">Klik disini </a>';
            // $mail->Body    = 'Klik link ini untuk verifikasi email anda <a href="http://localhost:8080/verifikasiEmail?email-kamu=Haruman@gmail.com' . $email_user . '">Verifikasi Email</a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        } catch (Exception $e) {
        }
    }
    public function EmailVer($email_kamu = null)
    {

        if (isset($_GET['email-kamu'])) {

            $email_kamu =  $_GET['email-kamu'];


            $queryEmail =  $this->db->query("SELECT mail_user, user_aktif FROM daftaruser WHERE mail_user = '$email_kamu'");

            $row = $queryEmail->getRow();
            if ($this->session->get('role_kamu') == NULL || $this->session->get('nama_kamu') == NULL) {

                if (isset($row->mail_user)) {
                    if ($row->user_aktif < 0) {
                        $this->builder->where('mail_user', $email_kamu);
                        $this->builder->set('user_aktif', true);
                        $this->builder->update();
                        $this->session->setTempdata('notificationDetail',  'Selamat, Email anda sudah terdaftar dan bisa digunakan, silahkan login dengan akun anda', 1);
                        $this->session->setTempdata('titleSwal',  'Selamat!!!', 1);
                        $this->session->setTempdata('iconSwal',  'success', 1);
                        return redirect()->to('/login');
                    } else if ($row->user_aktif > 0) {
                        $this->session->setTempdata('notificationDetail',  'Akun anda sudah terdaftar,silahkan login akun anda', 1);
                        $this->session->setTempdata('titleSwal',  'Selamat!!!', 1);
                        $this->session->setTempdata('iconSwal',  'success', 1);
                        return redirect()->to('/login');
                    } else {
                        $this->session->setTempdata('notificationDetail',  'Maaf, anda sudah daftar terlalu lama, silahkan daftar lagi yah', 1);
                        $this->session->setTempdata('titleSwal',  'Maaf yah', 1);
                        $this->session->setTempdata('iconSwal',  'error', 1);
                        return redirect()->to('/login');
                    }
                }
            } else {

                redirect()->to('/login');
            }
        } else {
            return redirect()->to('/');
        }
    }
    public function login()
    {
        if ($this->session->get('role_kamu') == NULL || $this->session->get('nama_kamu') == NULL) {
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
        if ($this->session->get('role_kamu') == NULL || $this->session->get('nama_kamu') == NULL) {
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
                $this->session->waktuhabis = time() - 1;
                $this->session->setTempdata('errorUsername', $this->validation->getError('login_username'), 1);
                $this->session->setTempdata('errorPassword', $this->validation->getError('login_password'), 1);
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
                $cek = $this->AuthModel->where('username_user', $username)->first();
                if ($cek) {

                    if (password_verify($password, $cek['password_user'])) {
                        if ($cek['user_aktif'] != 0) {
                            $data = [
                                'username_kamu' => $cek['username_user'],
                                'nama_kamu' => $cek['nama_lengkap_user'],
                                'role_kamu' => $cek['role_user'],
                            ];
                            $this->builder->set('user_login', '1');
                            $this->builder->where('username_user', $username);
                            $this->builder->update();
                            // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
                            return redirect()->to('/admiin');
                        } else {
                            $this->session->setTempdata('errorUsername', "Maaf kamu belum aktivasi akun kamu lewat email, silahkan check email " . $cek['mail_user'] . " untuk proses aktivasi", 1);
                            unset(
                                $_SESSION['nama_kamu'],
                                $_SESSION['role_kamu']
                            );
                            return redirect()->to('/login');
                        }
                    } else {
                        $this->session->setTempdata('errorPassword', 'Password salah', 1);

                        return redirect()->to('/login');
                    }
                } else {
                    $this->session->setTempdata('errorUsername', 'Username tidak terdaftar', 1);
                    return redirect()->to('/login');
                }
            }
        } else {
            return redirect()->to('/');
        }
    }
    public function forget()
    {
        if ($this->session->get('role_kamu') == NULL || $this->session->get('nama_kamu') == NULL) {
            helper('form');
            $data = [
                'title' => 'Register' . $_ENV['app.name'],
            ];
            $this->session->waktuhabis = time() - 10;

            return view('template/auth/header') . view('auth/viewForget', [
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
    public function lupapw()
    {
    }
    public function logout()
    {
        $this->builder->set('user_login', 0);
        $this->builder->where('username_user', $this->session->get('username_kamu'));
        $this->builder->update();
        $this->session->destroy();



        // or multiple values:
        unset(
            $_SESSION['nama_kamu'],
            $_SESSION['role_kamu']
        );
        $this->session->setTempdata('berhasilDaftar', 'Anda sudah logout, Silahkan Login Kembali', 10);
        return redirect()->to('/login');
    }
}
