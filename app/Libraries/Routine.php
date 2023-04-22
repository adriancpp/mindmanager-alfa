<?php namespace App\Libraries;

class Routine{

    public function newRoutineHelpPopup($params){
        return view('routine/part/newRoutine_help_popup', $params);
    }
}