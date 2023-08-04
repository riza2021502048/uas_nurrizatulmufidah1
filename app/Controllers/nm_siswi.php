<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class siswi extends BaseController
{
    protected $bm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->bm = new siswiModel();
        $this->menu
            = [
                    $menu = [
                        'beranda'=>[
                            'title'=>'beranda',
                            'link '=>base_url(). '/beranda',
                            'icon'=> 'fa-solid fa-house',
                            'aktif'=> 'active',
                        ],
                        'nm_siswi' => [
                            'title' => 'nm_siswi',
                            'link' => base_url() . '/nm_siswi',
                            'icon' => 'fa-solid fa-user"></i>',
                            'aktif' => ''
                        ],
                        'kd_pelajaran' => [
                            'title' => 'kd_pelajaran',
                            'link' => base_url() . '/kd_pelajaran',
                            'icon' => 'fa-solid fa-book"></i>',
                            'aktif' => ''
                        ],
                        'nm_ustadza' => [
                        'title' => 'nm_ustadza',
                        'link' => base_url() . '/nm_ustadza',
                        'icon' => 'fa-brands fa-chalkboard-user"></i>',
                        'aktif' => ''
                    ],
                    ],
            ];
            $this->rules = [
                'nm_siswi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nm_siswi tidak boleh kosong',
                    ]
                ],
                'alamat' =>
                [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'alamat tidak boleh kosong',
                    ]
                ],
                'jenis kelamin'    =>
                [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jenis kelamin tidak boleh kosong',
                    ]
                ],
                'kd_siswi'    =>
                [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'kd_siswi tidak boleh kosong',
                    ]
                ],
                
            ];
        }
    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">nm_siswi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item active">nm_siswi</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Data nm_siswi';

        $query = $this->bm->find();
        $data['data_nm_siswi'] = $query;
        return view('nm_siswi/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">nm_siswi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/nm_siswi">nm_siswi</a></li>
                            <li class="breadcrumb-item active">Input nm_siswi</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Tambah nm_siswi";
        $data['action'] = base_url() . '/nm_siswi/simpan';
        return view('nm_siswi/input', $data);
    }

    public function simpan()
    {
        if (strtolower($this->request->getMethod()) !== 'post') {

            return redirect()->back()->withInput();
        }
        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();

        try {
            $simpan = $this->bm->insert($dt);
            return redirect()->to('nm_siswi')->with('success', 'Data nm_siswi Tersimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'Data gagal dihapus');
        }
        try {
            $this->bm->delete($id);
            return redirect()->to('nm_siswi')->with('success', 'Data nm_siswi dengan kode ' . $id . ' berhasil di hapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('nm_siswi')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">nm_siswi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/nm_siswi">nm_siswi</a></li>
                            <li class="breadcrumb-item active">Edit nm_siswi</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Edit nm_siswi";
        $data['action'] = base_url() . '/nm_siswi/update';
        $data['edit_data'] = $this->bm->find($id);
        return view('nm_siswi/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['nm_ustadza']);

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        if (empty($dtEdit['nm_ustadza'])) {
            unset($dtEdit['nm_ustadza']);
        }

        try {
            $this->bm->update($param, $dtEdit);
            return redirect()->to('nm_siswi')->with('success', 'Data berhasil diperbarui');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
