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

        $data['routines'] = $result;

        $routines = $model->getRoutinesForCurrentDayWithStatus(session()->get('id'));


        foreach ($routines as $routine)
        {
            if( $routine->type == "YESNO" )
            {
                if( $routine->status == 1 )
                {
                    $routine->status = 1;
                }
            }
            else
            {
                //if warunek spelniony
                    //$routine->status = 1;

                //else
                    //$routine->status = 0;

            }

            //ex
            $routine->status = 0;
        }

        //<!--Current-->      <!--Done-->

        //<!--Left / TO do / Next -->

        //sorted
        $data['routines']['current'] = null;
        $data['routines']['done'] = [];
        $data['routines']['next'] = [];

        foreach ($routines as $routine)
        {
            //i teraz pomysl jak to najlepiej podzielic...
        }

        $data['routines'] = $routines;





                echo '<pre>';
                print_r($routines);
                echo '</pre>';

        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);
    }
}