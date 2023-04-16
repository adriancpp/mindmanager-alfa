<?php namespace App\Libraries;

class Dashboard{

    public function routineChecklistTable($params){
        return view('components/Dashboard/routine_checklist_table', $params);
    }
}