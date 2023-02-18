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

            }


            //if ma warunki
                //if spelnia
                    //completed
                //else
                    //not completed - updated curr/max
            //else
                //if status done
                    //completed
                //else
                    //not completed

            //ex
            $routine->status = 0;
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