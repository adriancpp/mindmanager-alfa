<?php

namespace App\Controllers;

use App\Models\RoutineRepository;
use stdClass;

class Charts extends BaseController
{
    public static function index()
    {
        $data = [];

        $db = db_connect();
        $model = new RoutineRepository($db);

        $routines = $model->getRoutinesForCharts(session()->get('id'));

        $sortedRoutines = [];

        echo $routines[0]->id;

        foreach($routines as $routine)
        {
            if(!array_key_exists($routine->id, $sortedRoutines))
            {
                $singleRoutine = new stdClass();
                $singleRoutine->id = $routine->id;
                $singleRoutine->name = $routine->name;
                $singleRoutine->data = []; //there will be array of element for chart

                $sortedRoutines[$routine->id] = $singleRoutine;
            }
            else
            {
                //next part
                $sortedRoutines[$routine->id]->data[] = 2;
                // tutaj moge dodac daty przeciez teraz na ez
            }
        }

        //ned print sorted routines    !!!!!!!!!!!

        foreach($routines as $routine)
        {
            //if($routine->id == )
            //and there routine buld
        }

        //select routine name

        //routine
            // routine historu
                // Dni []
                // Value []


                echo '<pre>';
                print_r($routines);
                echo '</pre>';

                echo '<br>===============<br>';

        echo '<pre>';
        print_r($sortedRoutines);
        echo '</pre>';



        echo view('templates/header', $data);
        echo view('charts', $data);
        echo view('templates/footer', $data);
    }
}