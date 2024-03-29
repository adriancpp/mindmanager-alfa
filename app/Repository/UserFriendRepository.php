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
            user1_id={$user1_id}
        ";
        //"SELECT * FROM posts";
        $res1 = $this->db->table('user_friend')
            ->select('user_friend.*, user.login as friend_name, user.id as friend_id')
            ->join('user', '
            user.id = user_friend.user2_id
            ')
            ->where($where)
            ->get()->getResult();

        $user1_id = $this->db->escape($userId);

        $where = "
            user2_id={$user1_id}
        ";
        //"SELECT * FROM posts";
        $res2 = $this->db->table('user_friend')
            ->select('user_friend.*, user.login as friend_name, user.id as friend_id')
            ->join('user', '
            user.id = user_friend.user1_id
            ')
            ->where($where)
            ->get()->getResult();

        $result = array_merge($res1,$res2);


        return $result;
    }

    function allConfirmed($userId)
    {
        $user1_id = $this->db->escape($userId);

        $where = "
            user1_id={$user1_id}
            AND confirmed=1
        ";
        //"SELECT * FROM posts";
        $res1 = $this->db->table('user_friend')
            ->select('user_friend.*, user.login as friend_name, user.id as friend_id')
            ->join('user', '
            user.id = user_friend.user2_id
            ')
            ->where($where)
            ->get()->getResult();

        $user1_id = $this->db->escape($userId);

        $where = "
            user2_id={$user1_id}
            AND confirmed=1
        ";
        //"SELECT * FROM posts";
        $res2 = $this->db->table('user_friend')
            ->select('user_friend.*, user.login as friend_name, user.id as friend_id')
            ->join('user', '
            user.id = user_friend.user1_id
            ')
            ->where($where)
            ->get()->getResult();

        $result = array_merge($res1,$res2);


        return $result;
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

    function isConfirmedAndOwnedBy($id, $userId)
    {
        $userId = $this->db->escape($userId);

        $where = "
            (user1_id={$userId} OR user2_id={$userId})
        ";

        return $this->db->table('user_friend')
            ->where($where)
            ->where(['id' => $id])
            //->where(['confirmed' => 1])
            ->get()->getResult();
    }

    function removeFriend($id)
    {
        $builder = $this->db->table('user_friend');

        $builder->where('id', $id);
        $builder->delete();
    }
}