<?php namespace  App\Repository;

use CodeIgniter\Database\ConnectionInterface;

class UserFriendRepository
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    function all($userId)
    {
        //"SELECT * FROM posts";
        return $this->db->table('user_friend')
            ->where(['user1_id' => $userId])
            ->get()->getResult();
    }
}