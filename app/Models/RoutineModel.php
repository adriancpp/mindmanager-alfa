<?php

namespace App\Models;

use CodeIgniter\Model;

class RoutineModel extends Model
{
    protected $table = 'routine';

    /*
    Type:
     */
    protected $allowedFields = ['name', 'type', 'sort', 'priority', 'required_amount', 'active', 'user_id', 'category'];
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