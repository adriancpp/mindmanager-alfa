<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $data = [];

        echo view('templates/header', $data);
        echo view('changelog', $data);
        echo view('templates/footer', $data);
    }

    public function login()
    {
        $data = [];

        helper(['form']);
        //        $db = db_connect();
        //        $model = new CustomModel($db);
        //
        //        $result = $model->test();
        //
        //        echo '<pre>';
        //        print_r($result);
        //        echo '</pre>';

        if($this->request->getMethod() == 'post')
        {
            //lets do validation here
            $rules = [
                'login' => 'required|min_length[6]|max_length[50]',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[login,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Nie poprawny login lub hasło'
                ]
            ];

            if( !$this->validate($rules, $errors))
            {
                $data['validation'] = $this->validator;
            }
            else {
                $model = new UserModel();
                $user = $model->where('login', $this->request->getVar('login'))
                    ->first();

                $this->setUserSession($user);

                return redirect()->to('dashboard');
            }
        }

        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'login' => $user['login'],
            'nickname' => $user['nickname'],
            'email' => $user['email'],
            'role' => $user['role'],
            'premium' => $user['premium'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register()
    {
        $data = [];

        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            //lets do validation here
            $rules = [
                'login' => 'required|min_length[3]|max_length[20]|is_unique[user.login]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if( !$this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }
            else {
                $model = new UserModel();

                $newData = [
                    'login' => $this->request->getVar('login'),
                    'nickname' => $this->request->getVar('login'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'premium' => false,
                    'role' => 1,
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/login');
            }
        }

        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer', $data);
    }

    public function profile()
    {
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if($this->request->getMethod() == 'post')
        {
            //lets do validation here
            $rules = [
                'nickname' => 'required|min_length[3]|max_length[20]',
            ];

            if($this->request->getPost('password') != '')
            {
                $rules['password'] = 'required|min_length[3]|max_length[20]';
                $rules['password_confirm'] = 'matches[password]';
            }

            if( !$this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }
            else {
                $model = new UserModel();

                $newData = [
                    'id' => session()->get('id'),
                    'nickname' => $this->request->getPost('nickname'),
                ];

                if($this->request->getPost('password') != '')
                {
                    $newData['password'] = $this->request->getPost('password');
                }

                $model->save($newData);
                session()->setFlashdata('success', 'Successfuly Updated');
                return redirect()->to('/profile');
            }
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();

        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}