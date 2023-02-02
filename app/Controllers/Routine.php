<?php

namespace App\Controllers;

class Routine extends BaseController
{
    public function index()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('routine', $data);
        echo view('templates/footer', $data);
    }
}
