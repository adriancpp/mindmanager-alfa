<?php

namespace App\Controllers;

use App\Models\RoutineModel;
use App\Models\RoutineRepository;
use App\Models\UserFriendModel;
use App\Models\UserModel;
use App\Repository\UserFriendRepository;

class Streak extends BaseController
{
    public static function index()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('streak', $data);
        echo view('templates/footer', $data);
    }
}