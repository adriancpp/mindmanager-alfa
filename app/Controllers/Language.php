<?php

namespace App\Controllers;

use App\Models\RoutineModel;
use App\Models\UserModel;

class Language extends BaseController
{
    public function index()
    {

        // set there lang to user model??

        $session = session();
        $locale = $this->request->getLocale();

        if(session()->get('id'))
        {
            $model = new UserModel();
            $user = $model->find(session()->get('id'));

            if($user)
            {
                $newData = [
                    'id' => session()->get('id'),
                    'lang' => $locale,
                ];

                $model->save($newData);
            }
        }

        $session->remove('lang');
        $session->set('lang',$locale);
        $url = base_url();
        return redirect()->to($url);
    }
}