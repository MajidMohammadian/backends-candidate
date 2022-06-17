<?php

class ProductModel {
    public function add($data = [])
    {
        global $db;

        $query = "INSERT INTO `product` (
            `Product_ID`, 
            `NR`, 
            `Name`, 
            `Product_URL`, 
            `Search_Keywords`, 
            `Description`, 
            `Category`, 
            `Category_ID`, 
            `SubCategory`, 
            `SubCategory_ID`, 
            `Brand`
        ) VALUES (
            '{$data['Product_ID']}', 
            '{$data['NR']}', 
            '{$data['Name']}', 
            '{$data['Product_URL']}', 
            '{$data['Search_Keywords']}', 
            '{$data['Description']}', 
            '{$data['Category']}', 
            '{$data['Category_ID']}', 
            '{$data['SubCategory']}', 
            '{$data['SubCategory_ID']}', 
            '{$data['Brand']}'
        )";

        if($db->query($query) == true) {
            return $db->insert_id;
        } else {
            echo '<pre dir="ltr">';
            var_dump($data);
            echo '</pre>';
            trigger_error("Error: " . $query . "<br>" . $db->error);
            exit();
        }
    }
}