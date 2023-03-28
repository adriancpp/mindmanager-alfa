<?php

namespace App\Models;

use CodeIgniter\Model;

class UserFriendModel extends Model
{
    protected $table = 'user_friend';

    /*
    Role:
    - 1 - user
    - 2 - admin
     */
    protected $allowedFields = ['user1_id', 'user2_id', 'confirmed'];
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