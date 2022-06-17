<?php

class ProductItemModel {
    public function add($data = [])
    {
        global $db;

        $data['Size_Family'] = is_array($data['Size_Family']) ? json_encode($data['Size_Family']) : $data['Size_Family'];
        $data['Active'] = (bool)$data['Active'];
        $query = "INSERT INTO `product_item` (
            `product_id`, 
            `SKU`, 
            `Price`, 
            `Retail_Price`, 
            `Thumbnail_URL`, 
            `Color`, 
            `Color_Family`, 
            `Size`, 
            `Size_Family`, 
            `Occassion`, 
            `Season`, 
            `Rating_Avg`, 
            `Rating_Count`, 
            `Warehouse`, 
            `Active`
        ) VALUES (
            '{$data['product_id']}', 
            '{$data['SKU']}', 
            '{$data['Price']}', 
            '{$data['Retail_Price']}', 
            '{$data['Thumbnail_URL']}', 
            '{$data['Color']}', 
            '{$data['Color_Family']}', 
            '{$data['Size']}', 
            '{$data['Size_Family']}', 
            '{$data['Occassion']}', 
            '{$data['Season']}', 
            '{$data['Rating_Avg']}', 
            '{$data['Rating_Count']}', 
            '{$data['Warehouse']}', 
            '{$data['Active']}'
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