<?php namespace  App\Models;

use CodeIgniter\Database\ConnectionInterface;

class RoutineRepository
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    function all($userId)
    {
        //"SELECT * FROM posts";
        return $this->db->table('routine')
            ->where(['user_id' => $userId])
            ->get()->getResult();
    }

    function allForDashboardCurrentDay($userId)
    {
        $currentData = date("d/m");
        //"SELECT * FROM posts";
        return $this->db->table('routine')
            //->join('routine_history', 'routine.id = routine_history.routine_id', 'right')
            ->where('cast( routine.created_at as date) = cast(now() as date)')
            ->where(['user_id' => $userId])

            ->get()->getResult();
    }
}