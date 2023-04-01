<?php

namespace App\Controllers;

use App\Models\RoutineModel;
use App\Models\RoutineRepository;
use App\Models\UserFriendModel;
use App\Models\UserModel;
use App\Repository\UserFriendRepository;

class UserFriend extends BaseController
{
    public static function index()
    {
        $data = [];

        $data['friends_confirmed'] = [];
        $data['friends_invite_sended'] = [];
        $data['friends_invite_geted'] = [];

        $db = db_connect();
        $model = new UserFriendRepository($db);

        $friends = $model->all(session()->get('id'));

        foreach ($friends as $friend)
            if($friend->confirmed == 0)
                if($friend->user1_id == session()->get('id'))
                    $data['friends_invite_sended'][] = $friend;
                else
                    $data['friends_invite_geted'][] = $friend;
            else
                $data['friends_confirmed'][] = $friend;

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';

        echo view('templates/header', $data);
        echo view('friends', $data);
        echo view('templates/footer', $data);
    }

    public function sendInvite()
    {
        $data = [];

        if($this->request->getMethod() == 'post')
        {
            $friendLogin = $this->request->getVar('login');

            $userModel = new UserModel();
            $userFrined = $userModel->where('login', $friendLogin)
                ->first();

            if($userFrined)
            {
                if($userFrined['id'] != session()->get('id'))
                {
                    $db = db_connect();
                    $model = new UserFriendRepository($db);

                    $invite = $model->findInvite(session()->get('id'), $userFrined['id']);

                    if(!$invite)
                    {
                        $newUserFriend = new UserFriendModel();

                        $newUserFriendData = [
                            'user1_id' => session()->get('id'),
                            'user2_id' => $userFrined['id'],
                            'confirmed' => 0
                        ];
                        $newUserFriend->save($newUserFriendData);
                    }
                }

            }
        }

        return redirect()->to('/friends');
    }

    public function accept()
    {
        if($this->request->getMethod() == 'post')
        {
            $id = $this->request->getVar('id');

            $db = db_connect();

            $model = new UserFriendRepository($db);
            //secure for not owner id paste

            $friendInvite = $model->ifInviteExist($id);
            if(empty($friendInvite))
                return redirect()->to('/friends');

            $userFriendModel = new UserFriendModel();

            if($friendInvite)
            {
                $newData = [
                    'id' => $id,
                    'confirmed' => 1
                ];

                $userFriendModel->save($newData);
            }
        }


        return redirect()->to('/friends');
    }
}