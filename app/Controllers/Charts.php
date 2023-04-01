<?php

namespace App\Controllers;

use App\Models\RoutineRepository;
use App\Models\UserFriendModel;
use App\Repository\UserFriendRepository;
use stdClass;

class Charts extends BaseController
{
    public static function index()
    {
        $data = [];

        $db = db_connect();
        $model = new RoutineRepository($db);

        $routines = $model->getRoutinesForCharts(session()->get('id'));

        $friendsModel = new UserFriendRepository($db);
        $data['friends'] = $friendsModel->allConfirmed(session()->get('id'));

        $sortedRoutines = [];

        foreach($routines as $routine)
        {
            if(!array_key_exists($routine->id, $sortedRoutines))
            {
                $singleRoutine = new stdClass();
                $singleRoutine->id = $routine->id;
                $singleRoutine->name = $routine->name;
                $singleRoutine->title = $routine->name;
                $singleRoutine->text = "Ilość";
                $singleRoutine->data = [];

                $sortedRoutines[$routine->id] = $singleRoutine;
            }

            $dataArr = [];

            $dataArr['y'] = $routine->amount;
            $dataArr['label'] = $routine->day;

            $sortedRoutines[$routine->id]->data[] = $dataArr;
        }

        $data['allRoutines'] = $sortedRoutines;


        echo view('templates/header', $data);
        echo view('charts', $data);
        echo view('templates/footer', $data);
    }

    public function friend($friendId)
    {
        //if user is in friend
        //if()

        $data = [];

        $db = db_connect();
        $model = new RoutineRepository($db);

        $routines = $model->getRoutinesForCharts($friendId);

        $friendsModel = new UserFriendRepository($db);
        $data['friends'] = $friendsModel->allConfirmed(session()->get('id'));

        $sortedRoutines = [];

        foreach($routines as $routine)
        {
            if(!array_key_exists($routine->id, $sortedRoutines))
            {
                $singleRoutine = new stdClass();
                $singleRoutine->id = $routine->id;
                $singleRoutine->name = $routine->name;
                $singleRoutine->title = $routine->name;
                $singleRoutine->text = "Ilość";
                $singleRoutine->data = [];

                $sortedRoutines[$routine->id] = $singleRoutine;
            }

            $dataArr = [];

            $dataArr['y'] = $routine->amount;
            $dataArr['label'] = $routine->day;

            $sortedRoutines[$routine->id]->data[] = $dataArr;
        }

        $data['allRoutines'] = $sortedRoutines;


        echo view('templates/header', $data);
        echo view('charts', $data);
        echo view('templates/footer', $data);
    }
}