<?php

namespace App\Controllers;

use App\Models\RoutineRepository;

class Charts extends BaseController
{
    public static function index()
    {
        $data = [];

        $db = db_connect();
        $model = new RoutineRepository($db);

        $routines = $model->getRoutinesForCharts(session()->get('id'));



        echo view('templates/header', $data);
        echo view('charts', $data);
        echo view('templates/footer', $data);
    }
}