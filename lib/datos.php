<?php

include_once 'db.php';

class Productos extends DB{
    function _construct(){

        parent::__construct();
    }

     
   
     /*==========obtenemos los productos por categoria===========*/

    public function getItemByAll(){
        $query = $this->connect()->query('SELECT * FROM bsale_test.product ');
        $query->execute([]);
        
        $items =[];

        while($row=$query->fetch()){

            $item = [
                'id_product'=>$row['id_product'],
                'name'      =>$row['name'],
                'url_image' =>$row['url_image'],
                'price'     =>$row['price'],
                'discount'  =>$row['discount'],
                'category'  =>$row['category']
            ];

            array_push($items,$item);
        }

        return $items;       

    }

    
}