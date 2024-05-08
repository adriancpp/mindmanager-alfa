<?php

namespace App\Controllers;

use App\Models\RoutineRepository;

class Dashboard extends BaseController
{
    public static function index()
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

            if( $routine->status )
            {
                $routine->status = 1;
            }
            else
                $routine->status = 0;

            //ex
            //$routine->status = 1;

            //priority
            if($routine->priority == 1)
            {
                $routine->priorityName = "Low";
                $routine->color = "#A8D3B7";
            }
            else if($routine->priority == 2)
            {
                $routine->priorityName = "Mid";
                $routine->color = "#F7EFC0";
            }
            else if($routine->priority == 3)
            {
                $routine->priorityName = "Hig";
                $routine->color = "#EEA4A7";
            }

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

            if($routine->status == 0)
            {
                $routine->status = "Do zrobienia";  //0%
                $data['routines']['next'][] = $routine;
            }
            else if($routine->status == 1)
            {
                $routine->status = "Gotowe";    //100%
                $data['routines']['done'][] = $routine;
            }
        }

        //sort by prio
        //then i can set the first from ['next'], to be ['current']

        //temporary solution!!!!
        if(count($data['routines']['next'])>0)
            $data['routines']['current'][] = $data['routines']['next'][0];
        else
            $data['routines']['current'] = [];

        array_shift($data['routines']['next']);

        //sort

        //$data['routines']['current'] = $data['routines']['next'][$a];


//                echo '<pre>';
//                print_r($data);
//                echo '</pre>';


        //load sports for dashboard
        // new query - get all last 5 days for user where tag is SPORT and user id is user id, sort by date
        $data['sports'] = [];
        $result = $model->allWithCategory(session()->get('id'), "SPORT");
//                        echo '<pre>';
//                print_r($result);
//                echo '</pre>';
//                die;


        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);
    }
}