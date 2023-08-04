<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class pelajaran extends BaseController
{
    protected $bm;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->km = new pelajaranModel();
        $this->menu
            =  [
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

        $this->rules = [
            'kd_pelajaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kd_pelajaran tidak boleh kosong',
                ]
            ],
            'nama_pelajaran' =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama_pelajaran tidak boleh kosong',
                ]
            ],
            'pengajar'    =>
            [
                'rules' => 'required',
                'errors' => [
                    'required' => 'pengajar tidak boleh kosong',
                ]
            ],
            
        ];
    }
    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">kd_pelajaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item active">kd_pelajaran</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Data kd_pelajaran';

        $query = $this->km->find();
        $data['data_kd_pelajaran'] = $query;
        return view('kd_pelajaran/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">kd_pelajaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/kd_pelajaran">kd_pelajaran</a></li>
                            <li class="breadcrumb-item active">Input kd_pelajaran</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Tambah kd_pelajaran";
        $data['action'] = base_url() . '/kd_pelajaran/simpan';
        return view('kd_pelajaran/input', $data);
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
            $simpan = $this->km->insert($dt);
            return redirect()->to('kd_pelajaran')->with('success', 'Data kd_pelajaran Tersimpan');
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
            $this->km->delete($id);
            return redirect()->to('kd_pelajaran')->with('success', 'Data kd_pelajaran dengan kode ' . $id . ' berhasil di hapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('kd_pelajaran')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">kd_pelajaran</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="' . base_url() . '/kd_pelajaran">kd_pelajaran</a></li>
                            <li class="breadcrumb-item active">Edit kd_pelajaran</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Edit kd_pelajaran";
        $data['action'] = base_url() . '/kd_pelajaran/update';
        $data['edit_data'] = $this->km->find($id);
        return view('kd_pelajaran/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['keterangan']);

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }

        if (empty($dtEdit['keterangan'])) {
            unset($dtEdit['keterangan']);
        }

        try {
            $this->km->update($param, $dtEdit);
            return redirect()->to('kd_pelajaran')->with('success', 'Data berhasil diperbarui');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
