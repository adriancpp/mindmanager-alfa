<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CustomModel;
use App\Models\RoutineHistoryModel;
use App\Models\RoutineModel;
use App\Models\RoutineRepository;
use App\Models\UserModel;

class Routine extends BaseController
{
    public function index()
    {
        $data = [];

        $db = db_connect();
        $model = new RoutineRepository($db);

        $result = $model->all(session()->get('id'));

//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';

        $data['routines'] = $result;

        echo view('templates/header', $data);
        echo view('routine', $data);
        echo view('templates/footer', $data);
    }

    public function createNew()
    {
        $data = [];

        $data['types'] = [
            ['YESNO', 'Tak/Nie', true],
            ['TIME', 'Czas', false],
            ['COUNT', 'Ilość', false]
        ];

        $data['prioritys'] = [
            [1, 'Niski', false],
            [2, 'Średni', true],
            [3, 'Wysoki', false]
        ];

        $data['actives'] = [
            [1, 'Aktywny', true],
            [0, 'Dezaktywowany', false]
        ];

        if($this->request->getMethod() == 'post')
        {


            //przy routine chyba musze zrobic tak ze kazdy moze dodac swoje kategorie - ale to moge zrobic pozniej
            //na razie mysle ze potrzebuje kategorie:
            /*
            1. SPORT
            2. CODE (project)
            3. LEARN (new tech)


             */


//            echo 'dte: ';
//            echo $this->request->getVar('category');
//            die;

            //lets do validation here
            $rules = [
                'name' => 'required|min_length[1]|max_length[50]',
                'sort' => 'required|is_natural_no_zero',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Błędne dane'
                ]
            ];

            if( !$this->validate($rules, $errors))
            {
                $data['validation'] = $this->validator;
            }
            else {
                $model = new RoutineModel();

                $newData = [
                    'name' => $this->request->getVar('name'),
                    'type' => $this->request->getVar('type'),
                    'sort' => $this->request->getVar('sort'),
                    'user_id' => session()->get('id'),
                    'priority' => $this->request->getVar('priority'),
                    'required_amount' => $this->request->getVar('required_amount'),
                    'active' => $this->request->getVar('active'),
                    'category' => $this->request->getVar('category'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Added');
                return redirect()->to('/routine');
            }
        }

        echo view('templates/header', $data);
        echo view('newRoutine', $data);
        echo view('templates/footer', $data);
    }

    public function edit($id)
    {

        // TO DO
        // - add secure for check if that route is created by current user_id

        $data = [];

        $data['types'] = [
            ['YESNO', 'Tak/Nie', false],
            ['TIME', 'Czas', false],
            ['COUNT', 'Ilość', false]
        ];

        $data['prioritys'] = [
            [1, 'Niski', false],
            [2, 'Średni', false],
            [3, 'Wysoki', false]
        ];

        $data['actives'] = [
            [1, 'Aktywny', false],
            [0, 'Dezaktywowany', false]
        ];


        $model = new RoutineModel();
        $routine = $model->find($id);

        for($a=0;$a<count($data['types']);$a++)
            if($data['types'][$a][0] == $routine['type'])
                $data['types'][$a][2] = true;

        for($a=0;$a<count($data['prioritys']);$a++)
            if($data['prioritys'][$a][0] == $routine['priority'])
                $data['prioritys'][$a][2] = true;

        for($a=0;$a<count($data['actives']);$a++)
            if($data['actives'][$a][0] == $routine['active'])
                $data['actives'][$a][2] = true;

        $data['routine'] = [
            'id' => $routine['id'],
            'name' => $routine['name'],
            'required_amount' => $routine['required_amount'],
            'sort' => $routine['sort'],
            'category' => $routine['category']
        ];


        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'name' => 'required|min_length[1]|max_length[50]',
                'sort' => 'required|is_natural_no_zero',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Błędne dane'
                ]
            ];

            if( !$this->validate($rules, $errors))
            {
                $data['validation'] = $this->validator;
            }
            else {
                $model = new RoutineModel();

                $newData = [
                    'id' => $id,
                    'name' => $this->request->getVar('name'),
                    'type' => $this->request->getVar('type'),
                    'sort' => $this->request->getVar('sort'),
                    'user_id' => session()->get('id'),
                    'priority' => $this->request->getVar('priority'),
                    'required_amount' => $this->request->getVar('required_amount'),
                    'active' => $this->request->getVar('active'),
                    'category' => $this->request->getVar('category'),
                ];

                $model->save($newData);
                return redirect()->to('/routine');
            }
        }

        echo view('templates/header', $data);
        echo view('editRoutine', $data);
        echo view('templates/footer', $data);
    }

    public function changeRoutineStatus($id = null, $status = null)
    {
        $db = db_connect();

        $model = new RoutineRepository($db);
        //secure for not owner id paste
        if(empty($model->ifUserIsRoutineOwner(session()->get('id'), $id)))
            return redirect()->to('/dashboard');

        $routineHistoryModel = $model->getRoutineHistoryByRoutine($id);

        $model = new RoutineHistoryModel();

        if($this->request->getMethod() == 'post')
        {
            if($routineHistoryModel)
            {
                $newData = [
                    'id' => $routineHistoryModel['id'],
                    'routine_id' => $id,
                    'status' => $status,
                    'value' => $this->request->getVar('amount')
                ];

                $model->save($newData);
            }
            else
            {
                $newData = [
                    'routine_id' => $id,
                    'status' => $status,
                    'value' => $this->request->getVar('amount')
                ];

                $model->save($newData);
            }
        }
        else
        {
            if($routineHistoryModel)
            {
                $newData = [
                    'id' => $routineHistoryModel['id'],
                    'routine_id' => $id,
                    'status' => $status
                ];

                $model->save($newData);
            }
            else
            {
                $newData = [
                    'routine_id' => $id,
                    'status' => $status
                ];

                $model->save($newData);
            }
        }

        return redirect()->to('/dashboard');
    }

    public function setActive()
    {
        if($this->request->getMethod() == 'post')
        {
            $id = $this->request->getVar('id');
            $status = $this->request->getVar('status');

            $db = db_connect();

            $model = new RoutineRepository($db);
            //secure for not owner id paste
            if(empty($model->ifUserIsRoutineOwner(session()->get('id'), $id)))
                return redirect()->to('/dashboard');

            $routineModel = new RoutineModel();
            $routine = $routineModel->find($id);

            if($routine)
            {
                $newData = [
                    'id' => $id,
                    'active' => $status
                ];

                $routineModel->save($newData);
            }
        }

        return redirect()->to('/routine');
    }

    public function deleteRoutine($routineId)
    {
        $db = db_connect();
        $model = new RoutineRepository($db);

        if(empty($model->ifUserIsRoutineOwner(session()->get('id'), $routineId)))
            return redirect()->to('/dashboard');

        $model->deleteRoutine($routineId);

        return redirect()->to('/routine');
    }
}
