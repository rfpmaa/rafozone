<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => ''
        ];
        return view('index', $data);
    }
}