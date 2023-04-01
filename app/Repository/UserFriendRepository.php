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
        $user1_id = $this->db->escape($userId);

        $where = "
            (user1_id={$user1_id}) OR (user2_id={$user1_id})
        ";
        //"SELECT * FROM posts";
        return $this->db->table('user_friend')
            ->select('user_friend.*, user.login as friend_name')
            ->join('user', 'user.id = user_friend.user2_id')
            ->where($where)
            ->get()->getResult();
    }

    function findInvite($user1_id, $user2_id)
    {
        $user1_id = $this->db->escape($user1_id);
        $user2_id = $this->db->escape($user2_id);

        $where = "
            (user1_id={$user1_id} AND user2_id={$user2_id}) OR (user1_id={$user2_id} AND user2_id={$user1_id})
        ";

        return $this->db->table('user_friend')
            ->where($where)
            ->get()->getResult();
    }

    function ifInviteExist($id)
    {
        return $this->db->table('user_friend')
            ->where(['id' => $id])
            ->where(['confirmed' => 0])
            ->get()->getResult();
    }
}