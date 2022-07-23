<?php
session_start();
require_once('../shopping/php/CreateDb.php');
require_once('../shopping/php/components.php');


// create instance of CreateDb class

$database = new CreateDb(dbname: "productdb", tablename: "producttb");


// do this for the add to cart functionality
if(isset($_POST['add'])){
    // print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
        // print_r($_SESSION['cart']);
       $item_array_id = array_column($_SESSION['cart'],"product_id");
    //    print_r($item_array_id);

       if(in_array($_POST['product_id'],$item_array_id)){
           echo "<script>alert('Product is already added in the cart')</script>" ;
           echo "<script>window.location=\"index.php\"</script>" ;
       }else{
         $count = count($_SESSION['cart']);
         $item_array = array(
            'product_id' => $_POST['product_id']
        );
        $_SESSION['cart'][$count] = $item_array;
        // print_r($_SESSION['cart']);
       }
    }else{
        $item_array = array(
            'product_id' => $_POST['product_id']
        );
        // create new session varaible
        $_SESSION['cart'][0]=$item_array;
        print_r($_SESSION['cart']);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.css">
    <title>Shopping Cart</title>
</head>

<body>
    <?php 
      require_once './php/header.php'
    
    ?>
    <div class="container">
        <div class="row text-center py-5">

            <?php
        $result = $database->getData();
        while ($row = mysqli_fetch_assoc($result)) {
            components($row['product_name'], $row['product_image'], $row['product_price'], $row['id']);
            //    pass the id when you are handling the cart button
        }
        ?>
            <!-- 
            //    components(productname:"Product 1",productprice:10000,productimg:"../shopping/upload/laptop-1.jpg");
            //    components(productname:"Product 2",productprice:15000,productimg:"../shopping/upload/laptop-2.jpg");
            //    components(productname:"Product 3",productprice:12000,productimg:"../shopping/upload/laptop-3.jpg");
            //    components(productname:"Product 4",productprice:9000,productimg:"../shopping/upload/laptop-4.jpg");
                -->



        </div>
    </div>



    <script src="../dist/js/bootstrap.min.js"></script>
</body>

</html>