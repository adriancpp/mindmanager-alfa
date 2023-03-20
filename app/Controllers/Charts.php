<?php

namespace App\Controllers;

use App\Models\RoutineRepository;

class Charts extends BaseController
{
    public static function index()
    {
        $data = [];


        //get data for charts, from history from there where is amount



        echo view('templates/header', $data);
        echo view('charts', $data);
        echo view('templates/footer', $data);
    }
}