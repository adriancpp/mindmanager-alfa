<?php

namespace App\Models;

use CodeIgniter\Model;

class RoutineHistoryModel extends Model
{
    protected $table = 'routine_history';

    /*
    Type:
     */
    protected $allowedFields = ['routine_id', 'status'];
    protected $useTimestamps = true;

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {

        return $data;
    }

    protected function beforeUpdate(array $data)
    {

        return $data;
    }

}