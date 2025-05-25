<?php
namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class Books extends Controller
{
    protected $bookModel;
    
    public function __construct()
    {
        $this->bookModel = new BookModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'books' => $this->bookModel->findAll()
        ];
        
        return view('books/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Buku',
            'validation' => \Config\Services::validation()
        ];

        return view('books/create', $data);
    }

    public function store()
    {
        if (!$this->validate($this->bookModel->validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->bookModel->save([
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        session()->setFlashdata('success', 'Buku berhasil ditambahkan');
        return redirect()->to('/books');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Buku',
            'validation' => \Config\Services::validation(),
            'book' => $this->bookModel->find($id)
        ];

        if (empty($data['book'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku tidak ditemukan');
        }

        return view('books/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate($this->bookModel->validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->bookModel->update($id, [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        session()->setFlashdata('success', 'Buku berhasil diperbarui');
        return redirect()->to('/books');
    }

    public function delete($id)
    {
        $this->bookModel->delete($id);
        session()->setFlashdata('success', 'Buku berhasil dihapus');
        return redirect()->to('/books');
    }
} 