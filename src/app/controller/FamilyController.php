<?php

class FamilyController {
    public function index()
    {
        global $db;

        $query = "SELECT * FROM `families` WHERE 1=1 ";

        $families = $db->query($query);

        $data['families'] = [];
        while($array = $families->fetch_assoc()) {
            $data['families'][] = $array;
        }

        return view('family', $data);
    }
}