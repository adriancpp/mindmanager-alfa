<?php

namespace App\Controllers;

use App\Models\RoutineModel;
use App\Models\RoutineRepository;
use App\Models\UserFriendModel;
use App\Models\UserModel;
use App\Repository\UserFriendRepository;

/*
    Idea:
1. pola w bazie:
- id taska
- nazwa
- kiedy ostatnio robilem
- jak czesto powinienem robic
0. hmm mozna uzyc juz tego co mam - od poczatku juz mialem przeciez...

Jak to w ogole ma dzialac?


*/

class Planner extends BaseController
{
    public static function index()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('planner', $data);
        echo view('templates/footer', $data);
    }
}