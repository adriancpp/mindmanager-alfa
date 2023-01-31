<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
        echo 'dupa main page of user';
    }

    public function login()
    {
        //        $db = db_connect();
        //        $model = new CustomModel($db);
        //
        //        $result = $model->test();
        //
        //        echo '<pre>';
        //        print_r($result);
        //        echo '</pre>';


        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer', $data);
    }

    public function register()
    {
        $data = [];

        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            //lets do validation here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[usersemail]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if( !$this->validate($rules))     //7;00
            {
                $data['validation'] = $this->validator;
            }
            else{
                //store the user in out db
            }
        }

        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer', $data);
    }
}