<header id="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
         <h4>
              <i class="fa fa-laptop"></i>Laptop Store
         </h4>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php">
               <h5>
                    <i class="fa fa-shopping-cart"></i> Cart
                    <!-- <span id="cart_count" class="text-white bg-danger">0</span> -->

                    <?php 
                       if(isset($_SESSION['cart'])){
                           $count = count($_SESSION['cart']);
                           echo "<span id=\"cart_count\" class=\"text-white bg-danger\">$count</span>";
                       }else{
                        echo "<span id=\"cart_count\" class=\"text-white bg-danger\">0</span>";
                       }
                    ?>
               </h5>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>