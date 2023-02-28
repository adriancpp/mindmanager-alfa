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

            //priority
            if($routine->priority == 1)
            {
                $routine->priorityName = "Niski";
                $routine->color = "#A8D3B7";
            }
            else if($routine->priority == 2)
            {
                $routine->priorityName = "Normalny";
                $routine->color = "#F7EFC0";
            }
            else if($routine->priority == 3)
            {
                $routine->priorityName = "Wysoki";
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

            if($routine->status === 0)
            {
                $routine->status = "Do zrobienia";
                $data['routines']['next'][] = $routine;
            }
            else if($routine->status === 1)
            {
                $routine->status = "Gotowe";
                $data['routines']['done'][] = $routine;
            }
        }

        //sort by prio
        //then i can set the first from ['next'], to be ['current']


        $data['routines']['current'][] = $data['routines']['next'][0];

        //sort

        //$data['routines']['current'] = $data['routines']['next'][$a];


        //$data['routines'] = $routines;

//                echo '<pre>';
//                print_r($data);
//                echo '</pre>';

        //   col              col
        // AKTUALNE   |    ZROBIONE
        // -----------|
        // NASTEPNE   |

        echo view('templates/header', $data);
        echo view('dashboard', $data);
        echo view('templates/footer', $data);
    }
}