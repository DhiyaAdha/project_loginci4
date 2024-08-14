<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;

use App\Models\UsersModel;

class Auth extends Controller
{
    public function register()
    {
        $val = $this->validate(
            [
                'name' => 'required',
                'username' => [
                    'rules' => 'required|is_unique[users.username]',
                    'errors' => [
                        'is_unique' => '{field} Sudah dipakai'
                    ]
                ],
                'password' => 'required',
                'level' => 'required',
            ],
        );

        if (!$val) {
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validate', $pesanvalidasi);
        }
        $data = array(
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'level' => $this->request->getPost('level'),
        );
        // dd($data);
        $model = new UsersModel;
        $model->insert($data);
        session()->setFlashdata('pesan', 'Selamat Anda berhasil Registrasi, silakan login!');
        return redirect()->to('/');
    }
}