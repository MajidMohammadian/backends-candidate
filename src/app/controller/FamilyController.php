<?php

class FamilyController {
    public function index()
    {
        global $db;

        $query = "
                SELECT `surname`, 
                         (SELECT count(*) FROM `families` WHERE `surname` = `f`.`surname`) AS member, 
                         (SELECT `first_name` FROM `families` WHERE `surname` = `f`.`surname` AND `gender` = 'male' AND `legal_guardian` = 1) AS father, 
                         (SELECT MAX(`age`) FROM `families` WHERE `surname` = `f`.`surname`) AS maxage, 
                         (SELECT GROUP_CONCAT(first_name SEPARATOR ', ') FROM `families` WHERE `surname` = `f`.`surname` AND `legal_guardian` = 0) AS children,
                         (SELECT count(*) FROM `families`) as total_member 
                  FROM `families` AS `f`
              GROUP BY `surname`
              ORDER BY `surname` ASC
                ";

        $families = $db->query($query);

        $data['families'] = [];
        while($array = $families->fetch_assoc()) {
            $data['families'][] = $array;
        }

        return view('family', $data);
    }
}