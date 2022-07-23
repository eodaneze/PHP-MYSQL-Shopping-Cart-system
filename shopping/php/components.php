<?php
  function components($productname,$productimg,$productprice,$productid){
    //   pass the productid when you are handling the cart button
      $element = "
      <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
      <form action=\"index.php\" method=\"post\">
          <div class=\"card shadow\">
              <div>
                  <img src=\"$productimg\" alt=\"img-1\"    class=\"img-fluid   card-img-top\">
              </div>
              <div class=\"card-body\">
                  <h5 class=\"card-title\">
                      $productname
                  </h5>
                  <h6>
                      <i class=\"fa fa-star text-warning\"></i>
                      <i class=\"fa fa-star text-warning\"></i>
                      <i class=\"fa fa-star text-warning\"></i>
                      <i class=\"far fa-star text-warning\"></i>
                      <i class=\"fa fa-star-half text-warning\"></i>
                     
                  </h6>
                  <p class=\"card-text\">
                      some quick example text to build on the card
                  </p>
                  <h5>
                      <small class=\"text-secondary\"><s><i class=\"fa fa-naira-sign\"></i>15,000</s></small>
                      <span class=\"price\"><i class=\"fa fa-naira-sign\">$productprice</i></span>
                  </h5>
                  <button class=\"btn btn-success my-3\" type=\"submit\" name=\"add\"><i class=\"fa fa-shopping-cart\"></i> Add to Cart</button>
                  <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
              </div>
          </div>
      </form>
  </div>
      ";
      echo $element;
  }


  function cartElement($productimg,$productname,$productprice,$productid){
      $element = "  <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
      <div class=\"border-rounded\">
          <div class=\"row bg-white p-4\">
              <div class=\"col-md-3\">
                  <img src=$productimg alt=\"image1\" class=\"img-fluid\">
              </div>
              <div class=\"col-md-6\">
                  <h5 class=\"pt-2\">$productname</h5>
                  <small class=\"text-secondary\">seller:DanCode</small>
                  <h5 class=\"pt-2\">$ $productprice</h5>
                  <button type=\"submit\" class=\"btn btn-success\">Save for later</button>
                  <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">remove</button>
              </div>
              <div class=\"col-md-3 py-5\">
                  <div class=\"d-flex\">
                     <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-minus\"></i></button>

                     <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                     <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fa fa-plus\"></i></button>
                  </div>
              </div>
          </div>
      </div>
  </form>";

  echo $element;
  }