<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Auth extends Controller
{
    public function register()
    {
        $validation = $this->validate(
            [
                'name' => 'required',
                'username' => [
                    'rules' => 'required|is_unique[users.username]',
                    'errors' => [
                        'is_unique' => '{field} sudah dipakai'
                    ]
                ],
                'password' => 'required',
                'level' => 'required',
            ]
        );

        if (!$validation) {
            return redirect()->to('/register')->withInput()->with('validate', $this->validator);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        ];

        $model = new UsersModel();
        $model->insert($data);

        session()->setFlashdata('pesan', 'Selamat Anda berhasil registrasi, silakan login!');

        return redirect()->to('/');
    }
}
