<?php

include_once 'productos.php';
/*=================LLAMA A SE MUESTRA POR CATEGORIA ==============*/
if(isset($_GET['category'])){

    $category = $_GET['category'];

    if($category == ''){

        echo json_encode(['statuscode'=> 400,'response'=>'No existe esa categoria']);
    }else{

        $productos = new Productos();
        $items = $productos->getItemByCategory($category);

        echo json_encode(['statuscode'=> 200, 'items'=>$items]);
    }
    /*============ LLAMA A MUESTRA POR BUSQUEDA =========*/
}elseif(isset($_GET['busqueda'])){

    $valorbusqueda=$_GET['busqueda'];

    if($valorbusqueda==''){
        echo json_encode(['statuscode'=>400,'response'=>'no existe busqueda']);
    }else{
        $productos = new Productos();
        $id="%".$valorbusqueda ."%";
        $items =$productos->get($id);

        echo json_encode(['statuscode'=>200,'items'=>$items]);
    }
  /*=====================LLAMA A MUESTRA POR PRODUCTO =============*/
}elseif(isset($_GET['get-item'])){

    $ids = $_GET['get-item'];

    if($ids == ''){
        echo json_encode(['statuscode' => 400, 
                            'response' => 'No hay valor para id']);    
    }else{
        $productos = new Productos();
        $item = $productos->getId($ids);
        echo json_encode(['statuscode' => 200, 
                        'item' => $item]);
    }

} /*================ LLAMA A MUESTRA TODOS LOS PRODUCTOS===================*/
else{
     
    $productos=new Productos();
    $items=$productos->getItemByAll();

    echo json_encode(['statuscode'=> 200,'items'=>$items]);

    /*echo json_encode(['statuscode'=> 400,'response'=>'No hay accion']);*/
 
}