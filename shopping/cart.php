<?php 
   session_start();
   require_once './php/CreateDb.php';
   require_once './php/components.php';

   $db = new CreateDb("Productdb","producttb");

   if(isset($_POST['remove'])){
    //    print_r($_GET['id']);

    if($_GET['action'] == 'remove'){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('product has been removed'..)</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
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
    <title>Cart</title>
</head>
<body class="bg-light">
    
  <?php 
    require_once './php/header.php'
  ?>
 <div class="container">
     <div class="row px-5">
          <div class="col-md-7">
              <div class="shopping-cart">
                   <h6>My Cart</h6>
                   <hr>
                   <!-- <form action="cart.php" method="get" class="cart-items">
                       <div class="border-rounded">
                           <div class="row bg-white p-4">
                               <div class="col-md-3">
                                   <img src="./upload/laptop-1.jpg" alt="image1" class="img-fluid">
                               </div>
                               <div class="col-md-6">
                                   <h5 class="pt-2">Product1</h5>
                                   <small class="text-secondary">seller:DanCode</small>
                                   <h5 class="pt-2">$599</h5>
                                   <button type="submit" class="btn btn-success">Save for later</button>
                                   <button type="submit" class="btn btn-danger mx-2" name="remove">remove</button>
                               </div>
                               <div class="col-md-3 py-5">
                                   <div class="d-flex">
                                      <button type="button" class="btn bg-light border rounded-circle"><i class="fa fa-minus"></i></button>

                                      <input type="text" value="1" class="form-control w-25 d-inline">
                                      <button type="button" class="btn bg-light border rounded-circle"><i class="fa fa-plus"></i></button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </form> -->


                   <?php 
                     $total = 0;
                       if(isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'],'product_id');
                        $result = $db->getData();
                        while($row = mysqli_fetch_assoc($result)){
                         foreach($product_id as $id){
                             if($row['id']==$id){
                              cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['id']);
                              $total = $total + (int)$row['product_price'];
                             }
                         }
                        }
                       }else{
                           echo "<h5>Cart is Empty</h5>";
                       }

                       
                   
                   ?>
              </div>
          </div>
         <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
             <div class="pt-4">
                  <h6>PRICE DETAILS</h6>
                  <hr>
                  <div class="row price-details">
                        <div class="col-md-6">
                            <?php 
                                if(isset($_SESSION['cart'])){
                                   $count = count($_SESSION['cart']);
                                   echo "<h6>price ($count items)</h6>";
                                }else{
                                    echo "<h6>price (0 items)</h6>";
                                }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$
                                <?php  echo $total ?>
                            </h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php echo $total ?></h6>
                        </div>
                  </div>
             </div>
         </div>
     </div>
 </div>


<script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>