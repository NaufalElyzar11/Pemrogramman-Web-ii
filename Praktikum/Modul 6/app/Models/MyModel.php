<?php namespace App\Models;

use CodeIgniter\Model;

class MyModel extends Model
{
    protected $data = [
        'nama' => 'Naufal Elyzar',
        'nim' => '2310817210019',
        'asal_prodi' => 'Teknologi Informasi',
        'hobi' => ['Membaca', 'Nonton Film', 'Gaming'],
        'skill' => ['PHP', 'Python', 'HTML', 'CSS'],
        'gambar' => 'Guwe.png', 
        'Valo' => 'Duelist Jago(Kadang kadang)'
    ];

    public function getMy()
    {
        return $this->data;
    }
}
