<?php

include_once '../../lib/db.php';

class Productos extends DB{
    function _construct(){

        parent::__construct();
    }

     /*=================obtenemos los productos por id ===========*/

     public function getId($ids){
        
        $query = $this->connect()->prepare('SELECT * FROM bsale_test.product WHERE product.id_product = :id');
        $query->execute(['id'=>$ids]);

        $row = $query->fetch();

        return[
            'id'       =>$row['id_product'],
            'name'     =>$row['name'],
            'url_image'=>$row['url_image'],
            'price'    =>$row['price'],
            'discount' =>$row['discount'],
            'category' =>$row['category'],
        ];

    }

    /*=================obtenemos los productos por BUSQUEDA ===========*/

    public function get($id){
        
        $query = $this->connect()->prepare("SELECT * FROM bsale_test.product WHERE product.name LIKE :id ");
        $query->execute(['id'=>$id]);

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
     /*==========obtenemos los productos por categoria===========*/

    public function getItemByCategory($category){
        $query = $this->connect()->prepare('SELECT * FROM bsale_test.product WHERE product.category=:cat');
        $query->execute(['cat'=>$category]);
        
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
    /*==========obtenemos todos los productos ===========*/

    public function getItemByAll($sql){
        $query = $this->connect()->query('SELECT * FROM bsale_test.product ');
        $query->execute([]);
        
        $items=[];

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