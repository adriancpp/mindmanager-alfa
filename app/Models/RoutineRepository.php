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

    function getRoutinesForCurrentDayWithStatus($userId)
    {
        $currentData = date("d/m");
        //"SELECT * FROM posts";
        return $this->db->table('routine')
            ->select('routine.id as id, routine.name, routine_history.id as rhId, routine.type as type, routine_history.status as status')
            ->join('routine_history', 'routine.id = routine_history.routine_id 
                    and cast( routine_history.created_at as date) = cast(now() as date)'

                , 'left')
            ->where(['routine.user_id' => $userId])
            ->where(['routine.active' => 1])

            ->get()->getResult();
    }
}