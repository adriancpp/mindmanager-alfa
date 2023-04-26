<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function index()
    {

        // set there lang to user model??

        $session = session();
        $locale = $this->request->getLocale();

        // userLang -> set( $locale );

        $session->remove('lang');
        $session->set('lang',$locale);
        $url = base_url();
        return redirect()->to($url);
    }
}