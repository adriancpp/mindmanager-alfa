<?php namespace App\Libraries;

class Dashboard{

    public function postItem($params){
        return view('components/post_item', $params);
    }
}