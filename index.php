<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">

        <!--================BOX ICONS==============================-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <title>Bsale Test</title>
    </head>

    <body>
        <!--==============Barra de navegacion===========-->
        <header class="l-header">
          <?php
          include_once('layout/navegador.php');
          ?>
        </header>

        <!--==============Productos=====================-->
        <section class="section__product">
           <?php
           include_once('layout/menu.php');
           ?>
        </section>

        <section class="product section">
           <?php        

           include_once 'lib/datos.php';
           /*================= validamos si se hace una busqueda =============*/
           if(!isset($_GET['busqueda'])){

           $productos=new Productos();
           $datos=[];
           $items=$productos->getItemByAll();
           $datos=$items;

          foreach($datos as $item){
              include('layout/items.php');
            } /*============================ si se hace una busqueda entonces ===================*/
        }else if(isset($_GET['busqueda'])){

            $response = json_decode(file_get_contents('https://bsale-prueba.herokuapp.com/api/productos/api-productos.php?busqueda=' . $_GET['busqueda']),true);

           if($response['statuscode']== 200){
               foreach($response['items'] as $item){
                   include('layout/items.php');
               }
           }else{
               echo "<h2>DEBE RELLENAR LA BUSQUEDA</h2>";
           }

          }              
        
           ?>
        </section>

         <!--===============  Main js======-->
        <script src="js/main.js"></script>

    </body>
</html>

