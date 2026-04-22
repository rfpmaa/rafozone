<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Selamat Datang di RafOzone'
        ];
        return view('index', $data);
    }
}