<?php

class UploadController
{
    public function index()
    {
        $content = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

        if(isJson($content)) {
            $results = json_decode($content, true);

            foreach($results as $result) {
                $params = [
                    'Product_ID'      => $result['Product_ID'],
                    'NR'              => $result['NR'],
                    'Name'            => $result['Name'],
                    'Product_URL'     => $result['Product_URL'],
                    'Search_Keywords' => $result['Search_Keywords'],
                    'Description'     => $result['Description'],
                    'Category'        => $result['Category'],
                    'Category_ID'     => $result['Category_ID'],
                    'SubCategory'     => $result['SubCategory'],
                    'SubCategory_ID'  => $result['SubCategory_ID'],
                    'Brand'           => $result['Brand'],
                ];

                $product_id = model('Product', 'add', $params);

                if(isset($result['Items']['Item'])) {
                    $params_item = [
                        'product_id'    => $product_id,
                        'SKU'           => $result['Items']['Item']['SKU'],
                        'Price'         => $result['Items']['Item']['Price'],
                        'Retail_Price'  => $result['Items']['Item']['Retail_Price'],
                        'Thumbnail_URL' => $result['Items']['Item']['Thumbnail_URL'],
                        'Color'         => $result['Items']['Item']['Color'],
                        'Color_Family'  => $result['Items']['Item']['Color_Family'],
                        'Size'          => $result['Items']['Item']['Size'],
                        'Size_Family'   => $result['Items']['Item']['Size_Family'],
                        'Occassion'     => json_encode($result['Items']['Item']['Occassion']),
                        'Season'        => json_encode($result['Items']['Item']['Season']),
                        'Rating_Avg'    => $result['Items']['Item']['Rating_Avg'],
                        'Rating_Count'  => $result['Items']['Item']['Rating_Count'],
                        'Warehouse'     => json_encode($result['Items']['Item']['Warehouse']),
                        'Active'        => (isset($result['Items']['Item']['Active'])) ? $result['Items']['Item']['Active'] : '0',
                    ];

                    model('ProductItem', 'add', $params_item);
                } else {
                    foreach($result['Items'] as $item) {
                        $params_item = [
                            'product_id'    => $product_id,
                            'SKU'           => $item['SKU'],
                            'Price'         => $item['Price'],
                            'Retail_Price'  => $item['Retail_Price'],
                            'Thumbnail_URL' => $item['Thumbnail_URL'],
                            'Color'         => $item['Color'],
                            'Color_Family'  => $item['Color_Family'],
                            'Size'          => $item['Size'],
                            'Size_Family'   => $item['Size_Family'],
                            'Occassion'     => json_encode($item['Occassion']),
                            'Season'        => json_encode($item['Season']),
                            'Rating_Avg'    => $item['Rating_Avg'],
                            'Rating_Count'  => $item['Rating_Count'],
                            'Warehouse'     => json_encode($item['Warehouse']),
                            'Active'        => (isset($item['Active'])) ? $item['Active'] : '0',
                        ];

                        model('ProductItem', 'add', $params_item);
                    }
                }
            }

            $_SESSION['success'] = count($results) . ' product added.';
            header('Location: /', true, 302);
        } else {
            trigger_error('Error: Could not parse json file');
            exit();
        }
    }
}