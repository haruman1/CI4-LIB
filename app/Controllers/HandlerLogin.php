<?php

namespace App\Controllers;


use App\Models\HandlerModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class HandlerLogin extends ResourceController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->handler = new HandlerModel();
        $this->builder = $this->db->table('user');
        $this->validation = \Config\Services::validation();
        $this->client = \Config\Services::curlrequest();
    }
    use ResponseTrait;
    // get all product
    public function index($id_user = null)
    {
        $count = $id_user == null ? $this->builder->countAll() : $this->builder->where('id_user', $id_user)->countAll();


        if ($id_user == null) {
            $data = [
                'status' => 200,
                'count' => $count,
                'data_user' => $this->handler->getUser($id_user),
            ];
            return $this->response->setJSON($data, 200);
        } else {
            $data =  $this->builder->select('username,email')->getWhere(['id_user' => $id_user])->getResult();
            if ($data) {
                return $this->respond($data);
            } else {
                return $this->failNotFound('No Data Found with id ' . $id_user);
            }

            if ($count == 0) {
                $this->response->setStatusCode(404, 'Nope. Not here.');
                $data = [
                    'statusCode' => 404,
                    'status' => 'failed',
                    'message' => "Data mahasiswa dengan id $id_user tidak ditemukan"
                ];
                return $this->response->setJSON($data, 404);
            } else {
                return $this->response->setJSON($data, 200);
            }
        }
    }


    // get single product
    public function show($id = null)
    {
        $data =  $this->builder->getWhere(['id_user' => $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }
    public function login($data)
    {

        $cek = $this->db->get_where('user', ['username' => $data['username']])->row_array();
        if ($cek->num_rows() > 0) {
            $data_check = $cek->row_array();
            if (password_verify($data['password'], $data_check['password'])) {
                $this->session->set_userdata('masuk', TRUE);
                if ($data['role'] == '1') {
                    $this->session->set_userdata('akses', '1');
                    $this->session->set_userdata('ses_id', $data_check['id_user']);
                    $this->session->set_userdata('ses_nama', $data_check['nama']);
                    redirect('admin');
                } else {
                    $this->session->set_userdata('akses', '2');
                    $this->session->set_userdata('ses_id', $data_check['id_user']);
                    $this->session->set_userdata('ses_nama', $data_check['nama']);
                    redirect('user');
                }
            } else {
                $url = base_url('auth');
                echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
                redirect($url);
            }
        } else {
            $url = base_url('auth');
            echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
            redirect($url);
        }
    }
    // create a product
    public function create()
    {

        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email.id,{id}]',
                'errors' => [
                    'required' => '{field} user harus diisi.',
                    'is_unique' => '{field} sudah pernah daftar,silahkan login .',
                    'valid_Email' => 'Format {$field} user tidak valid.',

                ],
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username.id,{id}]|max_length[7]',
                'errors' => [
                    'required' => '{field} user harus diisi.',
                    'is_unique' => '{field} sudah pernah daftar,silahkan login .',
                    'max_length' => '{field} maksimal 7 karakter.',
                ],
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mahasiswa harus diisi.',

                ],
            ],
            'password_kamu' => [
                'rules' => 'required|trim|min_length[8]|max_length[15]',
                'errors' => [
                    'required' => '{field} mahasiswa harus diisi.',
                    'min_length' => '{field} minimal 8 karakter.',
                    'max_length' => '{field} maksimal 15 karakter.',
                ],
            ],
            'tanggal_dibuat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} mahasiswa harus diisi.',
                ],
            ],
        ])) {
            $this->response->setStatusCode(400);
            $data = [
                'statusCode' => 400,
                'status' => 'fail',
                'messages' => $this->validation->getErrors(),
            ];
            return $this->response->setJSON($data);
        }
        $return = $this->handler->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama'),
            'password' => $this->request->getVar('password_kamu'),
            'date_created' => $this->request->getVar('tanggal_dibuat'),
        ]);
        $this->response->setStatusCode(200);
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'messages' => 'Data user berhasil ditambahkan',
            'data' => $return,
        ];
        return $this->response->setJSON($data);
    }
    public function update($id = null)
    {
        $model = new HandlerModel();
        $id = $this->request->getVar('id');
        $data = [
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama'),
            'password' => $this->request->getVar('password_kamu'),
            'date_created' => $this->request->getVar('tanggal_dibuat'),
        ];
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    public function hitApi()
    {

        $response = $this->client->request('GET', 'https://api.myip.com/', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
        $result = $response->getBody();
        return $result;
    }
    // public function update($id = null)
    // {

    //     $json = $this->request->getJSON();
    //     if ($json) {
    //         $data = [
    //             'email' => $json->email,
    //             'username' => $json->username,
    //             'nama_lengkap' => $json->nama,
    //             'password' => $json->password_kamu,
    //             'date_created' => $json->tanggal_dibuat,
    //         ];
    //     } else {
    //         $input = $this->request->getRawInput();
    //         $data = [
    //             'email' => $input['email'],
    //             'username' => $input['username'],
    //             'nama_lengkap' => $input['nama'],
    //             'password' => $input['password_kamu'],
    //             'date_created' => $input['tanggal_dibuat']
    //         ];
    //     }
    //     // Insert to Database
    //     $this->handler->update($id, $data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data Updated'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }

    // update product
    // public function update($id = null)
    // {
    //     if ($id == null || $this->builder->where('id_user', $id)->get()->getRowArray() == null) {
    //         if (!$this->validate([
    //             'email' => [
    //                 'rules' => 'required|valid_email|is_unique[user.email.id,{id}]',
    //                 'errors' => [
    //                     'required' => '{field} user harus diisi.',
    //                     'is_unique' => '{field} sudah pernah daftar,silahkan login .',
    //                     'valid_Email' => 'Format {$field} user tidak valid.',

    //                 ],
    //             ],
    //             'username' => [
    //                 'rules' => 'required|is_unique[user.username.id,{id}]|max_length[7]',
    //                 'errors' => [
    //                     'required' => '{field} user harus diisi.',
    //                     'is_unique' => '{field} sudah pernah daftar,silahkan login .',
    //                     'max_length' => '{field} maksimal 7 karakter.',
    //                 ],
    //             ],
    //             'nama' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} mahasiswa harus diisi.',

    //                 ],
    //             ],
    //             'password_kamu' => [
    //                 'rules' => 'required|trim|min_length[8]|max_length[15]',
    //                 'errors' => [
    //                     'required' => '{field} mahasiswa harus diisi.',
    //                     'min_length' => '{field} minimal 8 karakter.',
    //                     'max_length' => '{field} maksimal 15 karakter.',
    //                 ],
    //             ],
    //             'tanggal_dibuat' => [
    //                 'rules' => 'required',
    //                 'errors' => [
    //                     'required' => '{field} mahasiswa harus diisi.',
    //                 ],
    //             ],
    //         ])) {
    //             $this->response->setStatusCode(400);
    //             $data = [
    //                 'statusCode' => 400,
    //                 'status' => 'fail',
    //                 'messages' => $this->validation->getErrors(),
    //             ];
    //             return $this->response->setJSON($data);
    //         }
    //     }
    //     // $return = $this->handler->update([
    //     //     'email' => $this->request->getVar('email'),
    //     //     'username' => $this->request->getVar('username'),
    //     //     'nama_lengkap' => $this->request->getVar('nama'),
    //     //     'password' => $this->request->getVar('password_kamu'),
    //     //     'date_created' => $this->request->getVar('tanggal_dibuat'),
    //     // ]);
    //     $this->response->setStatusCode(200);
    //     $array_data = [
    //         'email' => $this->request->getVar('email'),
    //         'username' => $this->request->getVar('username'),
    //         'nama_lengkap' => $this->request->getVar('nama'),
    //         'password' => $this->request->getVar('password_kamu'),
    //         'date_created' => $this->request->getVar('tanggal_dibuat'),
    //     ];
    //     $id = $this->request->getVar('id');
    //     $return = $this->handler->update($id, $array_data);
    //     $data = [
    //         'statusCode' => 200,
    //         'status' => 'success',
    //         'messages' => 'Data user berhasil di update',
    //         'data' => $return,
    //     ];
    //     return $this->response->setJSON($data);
    //     // $json = $this->request->getJSON();
    //     // if ($json) {
    //     //     $data = [
    //     //         'product_name' => $json->product_name,
    //     //         'product_price' => $json->product_price
    //     //     ];
    //     // } else {
    //     //     $input = $this->request->getRawInput();
    //     //     $data = [
    //     //         'product_name' => $input['product_name'],
    //     //         'product_price' => $input['product_price']
    //     //     ];
    //     // }
    //     // // Insert to Database
    //     // $this->Auth->update($id, $data);
    //     // $response = [
    //     //     'status'   => 200,
    //     //     'error'    => null,
    //     //     'messages' => [
    //     //         'success' => 'Data Updated'
    //     //     ]
    //     // ];
    //     // return $this->respond($response);
    // }

    // delete product
    public function delete($id = null)
    {

        $data =  $this->handler->find($id);
        if ($data) {
            $this->handler->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];

            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No Data Found with id ' . $id);
        }
    }
}
