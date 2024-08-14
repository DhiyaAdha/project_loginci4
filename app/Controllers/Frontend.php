<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Frontend extends Controller
{
    public function index(): string
    {
        return view('frontend/login');
    }
    
    public function register(): string
    {
        session();
        $data = [
            'validate' => \Config\Services::validation()
        ];
        return view('frontend/register', $data);
    }
}
