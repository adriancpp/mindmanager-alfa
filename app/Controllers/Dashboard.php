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

        $result = $model->allForDashboardCurrentDay(session()->get('id'));



                echo '<pre>';
                print_r($result);
                echo '</pre>';

        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);
    }
}