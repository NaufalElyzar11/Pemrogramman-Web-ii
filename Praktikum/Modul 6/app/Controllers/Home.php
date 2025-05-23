<?php namespace App\Controllers;

use App\Models\MyModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new MyModel();
        $data['nama'] = $model->getMy()['nama'];
        $data['nim'] = $model->getMy()['nim'];
        return view('beranda', $data);
    }

    public function profil()
    {
        $model = new MyModel();
        $data['my'] = $model->getMy();
        return view('profil', $data);
    }
}
