<?php
namespace Studip\Mobile;

class Course {
    static function findAllByUser($user_id)
    {

        foreach (\SemesterData::GetSemesterArray() as $key => $value){
            if (isset($value['beginn']) && $value['beginn'])
                $sem_start_times[] = $value['beginn'];
        }

        $sem_number_sql = "INTERVAL(start_time," . join(",",$sem_start_times) .")";
        $sem_number_end_sql = "IF(duration_time=-1,-1,INTERVAL(start_time+duration_time," . join(",",$sem_start_times) ."))";

        $query = "SELECT seminare.VeranstaltungsNummer AS sem_nr, seminare.Name, seminare.Seminar_id, seminare.status as sem_status, seminar_user.status, seminar_user.gruppe,
                seminare.chdate, seminare.visible, admission_binding,modules,IFNULL(visitdate,0) as visitdate, admission_prelim,
                {$sem_number_sql} as sem_number, {$sem_number_end_sql} as sem_number_end $add_fields
                FROM seminar_user LEFT JOIN seminare  USING (Seminar_id)
                LEFT JOIN object_user_visits ouv ON (ouv.object_id=seminar_user.Seminar_id AND ouv.user_id='$user->id' AND ouv.type='sem')
                $add_query
                WHERE seminar_user.user_id = '$user_id'";

        $stmt = \DBManager::get()->query($query);

        return $stmt->fetchAll();
    }
}
