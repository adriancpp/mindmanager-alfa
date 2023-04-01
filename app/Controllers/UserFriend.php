<?php

namespace App\Controllers;

use App\Models\RoutineRepository;
use App\Repository\UserFriendRepository;

class UserFriend extends BaseController
{
    public static function index()
    {
        $data = [];

        $db = db_connect();
        $model = new UserFriendRepository($db);

        $friends = $model->all(session()->get('id'));

        $data['friends'] = $friends;

//        echo '<pre>';
//        print_r($friends);
//        echo '</pre>';

        echo view('templates/header', $data);
        echo view('friends', $data);
        echo view('templates/footer', $data);
    }

    public static function sendInvite()
    {
        $data = [];

        $db = db_connect();
        $model = new UserFriendRepository($db);

        $friends = $model->all(session()->get('id'));

        $data['friends'] = $friends;

        echo '<pre>';
        print_r($friends);
        echo '</pre>';

        echo view('templates/header', $data);
        echo view('friends', $data);
        echo view('templates/footer', $data);
    }
}