<?php

namespace App\Controllers;

    class Home extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/books');
        }
        return redirect()->to('/login');
    }
}