<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
       
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
                'icon' => 'fa-solid fa-user',
                'aktif' => ''
            ],
            'kd_pelajaran' => [
                'title' => 'kd_pelajaran',
                'link' => base_url() . '/kd_pelajaran',
                'icon' => 'fa-solid fa-book',
                'aktif' => ''
            ],
            'nm_ustadza' => [
            'title' => 'nm_ustadza',
            'link' => base_url() . '/nm_ustadza',
            'icon' => 'fa-brands fa-chalkboard-user',
            'aktif' => ''
        ],
];
        $breadcrumb = '<div class="col-sm-6">
            <h1 class="m-0">Beranda</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Beranda</li>
            </ol>
            </div>';
    
        $data['menu']= $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Selamat Datang di My Website";
        $data['selamat_datang']= "Aplikasikan fitur dengan baik";
        return view('template/content', $data);
        
    }
}
