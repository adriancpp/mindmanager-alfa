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

        //select routine name

        //routine
            // routine historu
                // Dni []
                // Value []


                echo '<pre>';
                print_r($routines);
                echo '</pre>';



        echo view('templates/header', $data);
        echo view('charts', $data);
        echo view('templates/footer', $data);
    }
}