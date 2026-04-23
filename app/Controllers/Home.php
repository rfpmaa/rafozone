<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RafOzone'
        ];
        return view('index', $data);
    }
}