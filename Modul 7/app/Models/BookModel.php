<?php
namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['judul', 'penulis', 'penerbit', 'tahun_terbit'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';


    protected $validationRules = [
        'judul' => [
            'rules' => 'required|string',
            'errors' => [
                'required' => 'Judul harus diisi',
                'string' => 'Judul harus berupa teks'
            ]
        ],
        'penulis' => [
            'rules' => 'required|string',
            'errors' => [
                'required' => 'Penulis harus diisi',
                'string' => 'Penulis harus berupa teks'
            ]
        ],
        'penerbit' => [
            'rules' => 'required|string',
            'errors' => [
                'required' => 'Penerbit harus diisi',
                'string' => 'Penerbit harus berupa teks'
            ]
        ],
        'tahun_terbit' => [
            'rules' => 'required|numeric|greater_than[1800]|less_than[2024]',
            'errors' => [
                'required' => 'Tahun terbit harus diisi',
                'numeric' => 'Tahun terbit harus berupa angka',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800',
                'less_than' => 'Tahun terbit harus lebih kecil dari 2024'
            ]
        ]
    ];
} 