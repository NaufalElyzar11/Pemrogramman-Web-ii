<?php
namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/books');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $data = $this->request->getPost(['username', 'password']);

        if (!$this->validateData($data, [
            'username' => 'required',
            'password' => 'required'
        ])) {
            return redirect()->back()->withInput();
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->back()->withInput();
        }

        $passwordCheck = password_verify($password, $user['password']);

        if (!$passwordCheck) {
            session()->setFlashdata('error', 'Username atau password salah');
            return redirect()->back()->withInput();
        }

        $userData = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ];

        session()->set($userData);
        return redirect()->to('/books');
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/books');
        }
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $rules = [
            'username' => 'required|min_length[4]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]'
        ];

        $errors = [
            'username' => [
                'required' => 'Username harus diisi',
                'min_length' => 'Username minimal 4 karakter',
                'is_unique' => 'Username sudah digunakan'
            ],
            'email' => [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan'
            ],
            'password' => [
                'required' => 'Password harus diisi',
                'min_length' => 'Password minimal 6 karakter'
            ],
            'confirm_password' => [
                'required' => 'Konfirmasi password harus diisi',
                'matches' => 'Konfirmasi password tidak cocok'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $hashedPassword
        ]);

        session()->setFlashdata('success',  'Registrasi berhasil, silakan login');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
} 