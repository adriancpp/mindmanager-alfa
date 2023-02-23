<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CustomModel;
use App\Models\RoutineModel;
use App\Models\RoutineRepository;
use App\Models\UserModel;

class RoutineHistory extends BaseController
{
    public function index()
    {
        $data = [];


        echo view('templates/header', $data);
        echo view('routine', $data);
        echo view('templates/footer', $data);
    }

}
