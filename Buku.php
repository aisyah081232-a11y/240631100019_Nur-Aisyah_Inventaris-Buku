<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();

        return view('buku/index', $data);
    }

    public function tambah()
    {
        return view('buku/tambah');
    }

    public function simpan()
    {
        $aturan = [
            'judul_buku' => 'required|min_length[3]|max_length[150]',
            'penulis' => 'required|max_length[100]',
            'kategori' => 'required|max_length[50]',
            'tahun_terbit' => 'required|integer|greater_than_equal_to[1901]|less_than_equal_to[2155]',
            'penerbit' => 'required|max_length[100]',
        ];

        if (!$this->validate($aturan)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->insert([
            'judul_buku' => $this->request->getPost('judul_buku'),
            'penulis' => $this->request->getPost('penulis'),
            'kategori' => $this->request->getPost('kategori'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'penerbit' => $this->request->getPost('penerbit'),
        ]);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);

        if (!$data['buku']) {
            return redirect()->to('/buku')
                ->with('error', 'Data buku tidak ditemukan.');
        }

        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')
                ->with('error', 'Data buku tidak ditemukan.');
        }

        $aturan = [
            'judul_buku' => 'required|min_length[3]|max_length[150]',
            'penulis' => 'required|max_length[100]',
            'kategori' => 'required|max_length[50]',
            'tahun_terbit' => 'required|integer|greater_than_equal_to[1901]|less_than_equal_to[2155]',
            'penerbit' => 'required|max_length[100]',
        ];

        if (!$this->validate($aturan)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->bukuModel->update($id, [
            'judul_buku' => $this->request->getPost('judul_buku'),
            'penulis' => $this->request->getPost('penulis'),
            'kategori' => $this->request->getPost('kategori'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
            'penerbit' => $this->request->getPost('penerbit'),
        ]);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil diperbarui!');
    }

    public function hapus($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')
                ->with('error', 'Data buku tidak ditemukan.');
        }

        $this->bukuModel->delete($id);

        return redirect()->to('/buku')
            ->with('success', 'Data buku berhasil dihapus!');
    }
}
