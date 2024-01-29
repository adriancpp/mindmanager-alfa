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
            ->orderBy('routine.sort', 'ASC')
            ->get()->getResult();
    }

    function ifUserIsRoutineOwner($userId, $routineId)
    {
        //"SELECT * FROM posts";
        return $this->db->table('routine')
            ->where(['user_id' => $userId])
            ->where(['id' => $routineId])
            ->get()->getResult();
    }

    function getRoutineHistoryByRoutine($routineId)
    {
        //"SELECT * FROM posts";
        return $this->db->table('routine_history')
            ->where(['routine_id' => $routineId])
            ->where('cast( routine_history.updated_at as date) = cast(now() as date)')
            ->get()->getFirstRow('array');
    }

    function getRoutinesForCurrentDayWithStatus($userId)
    {
        $currentData = date("d/m");
        //"SELECT * FROM posts";
        return $this->db->table('routine')
            ->select('routine.id as id, routine.name, routine_history.id as rhId, 
                        routine.type as type, routine_history.status as status, routine.priority as priority, 
                        routine_history.value as amount')
            ->join('routine_history', 'routine.id = routine_history.routine_id 
                    and cast( routine_history.updated_at as date) = cast(now() as date)
                    
                    ' , 'left')
            ->where(['routine.user_id' => $userId])
            ->where(['routine.active' => 1])

            ->orderBy('routine.sort', 'ASC')
            ->get()->getResult();
    }

    function getRoutinesForCharts($userId)
    {
        return $this->db->table('routine')
            ->select('routine.id as id, routine.name, routine_history.id as rhId, 
                        routine.type as type, routine_history.status as status, routine.priority as priority, 
                        routine_history.value as amount, 
                        
                        CAST(routine_history.updated_at As Date) as day
                        
                        ')
            ->join('routine_history', 'routine.id = routine_history.routine_id 
                    
                    ' , 'left')
            ->where(['routine.user_id' => $userId])
            ->where(['routine.active' => 1])
            ->where(['routine.type' => "COUNT"])
            ->where(['routine_history.id !=' => null])
            ->where(['routine_history.status' => 1])
            ->orderBy('routine_history.updated_at', 'ASC')


            ->get()->getResult();
    }

    function deleteRoutine($routineId)
    {
        //delete history
        $builder = $this->db->table('routine_history');

        $builder->where('routine_id', $routineId);
        $builder->delete();

        //delete rouitne
        $builder = $this->db->table('routine');

        $builder->where('id', $routineId);
        $builder->delete();
    }

    function allWithCategory($userId, $category)
    {
        //"SELECT * FROM posts";
        //new query will be there - need take:
           //all with sport with date higher than date > 5 days ago - and for that i join activities1!!!!
        //first, check if i use similiar thing in that repository
        //maybe can i use it: getRoutinesForCurrentDayWithStatus()
        return $this->db->table('routine')
            ->where(['user_id' => $userId])
            ->where(['category' => $category])
            ->orderBy('routine.sort', 'ASC')
            ->get()->getResult();
    }
}