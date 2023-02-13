<?php

namespace App\Controllers;

use App\Models\RoutineRepository;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [];

        $db = db_connect();
        $model = new RoutineRepository($db);

        $result = $model->all(session()->get('id'));
        // ->getUserRoutinesDashboard()    -> where day in join routine history if true -> status = ok, else 'no'

        $data['routines'] = $result;

        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);
    }

    public function test()
    {
        $data = [];

        $doc = new \DOMDocument();

        $stringa = 'wp.pl';

        echo $stringa;
        $doc->loadHTMLFile($stringa);
        $h1 = $doc->getElementsByTagName("title")->item(0)->textContent;
        echo $h1;

        echo 'test';
    }
}