<?php 
session_start();
include_once "config/dbconnect.php";
$email=$_SESSION['email'];
$products=$_GET['products'];
if(isset($_POST['add_to_cart'])){
    $user=$_POST['user'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity=$_POST['quantity'];
    $select_cart =  "SELECT * FROM cart WHERE product_id = '$products' AND user_id = '$user' AND is_checked_out=0";
    $result=$conn->query($select_cart);
    if($result->num_rows>0){
        echo '<script>alert("product alredy added to cart!")</script>';
     }
     else{
       $sql= mysqli_query($conn, "INSERT INTO cart (user_id,product_id,quantity) VALUES ('$user', '$products','$product_quantity')");
       echo'<script>alert("product added to cart!")</script>';
     }
  
  }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - Products</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        <link href="css/stylecat.css" rel="stylesheet">
        <link rel="stylesheet" href="css/navstyle.css">
        <link rel="stylesheet"href="css/buttonstyle.css">
        <link rel="stylesheet"href="cartstyle.css">

<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>
    <?php
   if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
 }
?>
        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <strong><span>bio</span>Me</strong>
                    </a>

                    <div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="shop.php"><i class="bi bi-shop-window"></i> Shop</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="bi bi-key"></i> Checkout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="bi bi-heart-fill"></i> Wishlist</a>
                            </li>
                            <?php if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
                            { ?>
                            <li class="nav-item">
                                    <a class="nav-link" href="logout.php"> <i class="bi bi-box-arrow-right"></i> Logout</a>
                                </li>
                            <?php }
                            else{ ?>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-left"></i>Login</a>
                            </li>
                         <?php } ?>
                      </ul>
                        <div class="d-none d-lg-block">
                        <?php if( isset($_SESSION['email'])&& !empty($_SESSION['email']) )
                        { ?>
                            <a href=" " style="font-size:11px" class="bi-person custom-icon me-3"> Welcome -<?php echo htmlentities($_SESSION['email']);?></a>
                        <?php }
                        else{ ?>
                            <a href=" " class="bi-person custom-icon me-3"></a> 
                                
                         <?php } ?>

                         <a href="cart.php" class="bi-bag custom-icon"> Cart<span>
                         </span></a>
                        </div>
                       
                    </div>
                </div>
            </div>
            </nav> 
           <!---->

           <div class="wrapper">
   <div></div>
    <div class="top_nav">
        <div class="left">
          <div class="search_bar">
          </div>
      </div> 
      <div class="right">
        <ul>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
          <li><a href="#"></a></li>
        </ul>
      </div>
    </div>
    <div class="bottom_nav">
      <ul>
      <div class="bottom_nav">
                            
      </ul>
  </div>

</div>



           <!----> 
            


                                <?php
                                include_once "config/dbconnect.php";
                                $sql="SELECT * from product where product_id='$products'";
                                $result = $conn-> query($sql);

                                if ($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){ 
                           ?> 
                                   
            <section class="product-detail section-padding">
                <div class="container">
                   <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="product-thumb">
                            <img src= "./admin/uploads/<?php echo $row['product_image']?>"class="img-fluid product-image" alt="" >
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="product-info d-flex">
                                <div>
                                    <h2 class="product-title mb-0"><?php echo $row['product_name']?></h2>

                                    <p class="product-p"></p>
                                </div>

                                <small class="product-price text-muted ms-auto mt-auto mb-5">₹ <?php echo $row['price']?></small>
                            </div>

                            <div class="product-description">

                                <strong class="d-block mt-4 mb-2">Description</strong>

                                <p class="lead mb-5"><?php echo $row['product_desc']?></p>
                            
                            <div>
                               
                            </select>
                                  
                            <div>
                            </div>  
                            <br><br>
 
                            <div class="product-cart-thumb row">
                                <div class="col-lg-6 col-12">
                                <form method="post" class="box" action="">
                                <label for="Quantity">
                                 Quantity
                                </label>
                                <input type="number"name="quantity" min="1" name="product_quantity" max="<?php echo $row['Total_quantity']?>" value="1">
                                </div>
                                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
                                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                                <?php $query=mysqli_query($conn,"select * from users where email='$email'");
                                while($row=mysqli_fetch_array($query))
                                {?>
                                <input type="hidden" name="user" value="<?php echo $row['user_id'];?>">
                                <?php } ?>
                             <div class="col-lg-6 col-12 mt-4 mt-lg-0">                              
                             <button type="submit" value="add to cart" name="add_to_cart" class="btn custom-btn cart-btn" data-bs-toggle="modal" data-bs-target="">Add to Cart</button>
                             </form>
                                   </div>

                                <p>
                                    <a href="#" class="product-additional-link"></a>

                                    <a href="#" class="product-additional-link">Delivery and Payment</a>
                                </p>
                            </div>

                        </div>

                    </div>
                  
                </div>
            </section>
           
            <?php
                                }
                            }
                        
                        ?>  

            <section class="related-product section-padding border-top">
            <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="mb-5">You Might Also Like</h2>
                        </div>

                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="#"> 
                                <?php
                                $sql="SELECT * from product where product_id=1";
                                $result = $conn-> query($sql);

                                if ($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){ 
                                    ?>                  
                               <img src= "./admin/uploads/<?php echo $row['product_image'];?>"class="img-fluid product-image" alt="" >;
                               
                        </a>
                                <div class="product-top d-flex">
                                    <span class="product-alert me-auto">New Arrival</span>

                                    <a href="#" class="bi-heart-fill product-icon"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                            <a href="#" class="product-title-link"><?php echo $row['product_name'];?></a>
                                        </h5>
                                    </div>

                                    <small class="product-price text-muted ms-auto">₹ <?php echo $row['price'];?></small>
                                </div>
                                <a href="product-detail.php?products=<?php echo $row['product_id'];?>" class="button <?php echo ($row['Total_quantity']==0)?'':'disabled'; ?>">view</a>
                            </div>
                                </form>
                                <?php 
                            if($row['Total_quantity']==0)
                            {
                                echo('<span style="color:#FF0000;text-align:center;">out of stock!</span>');
                            }
                            ?>
                        </div>
                        <?php
                                }
                            }
                        
                        ?> 
                        <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="#"> 
                                <?php
                                $sql="SELECT * from product where product_id=9";
                                $result = $conn-> query($sql);

                                if ($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){ 
                                    ?>                  
                               <img src= " ./admin/uploads/<?php echo $row['product_image'];?>"class="img-fluid product-image" alt="" >
                              
                             
                        </a>
                                <div class="product-top d-flex">
                                    <span class="product-alert"></span>

                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                        <a href="#" class="product-title-link"><?php echo $row['product_name'];?></a>
                                        </h5>

                                    </div>

                                    <small class="product-price text-muted ms-auto">₹ <?php echo $row['price'];?></small>
                                </div>
                                <a href="product-detail.php?products=<?php echo $row['product_id'];?>" class="button <?php echo ($row['Total_quantity']==0)?'':'disabled'; ?>">view</a> 
                            </div>
                            <?php 
                            if($row['Total_quantity']==0)
                            {
                                echo('<span style="color:#FF0000;text-align:center;">out of stock!</span>');
                            }
                            ?>
                        </div>
                        <?php
                                }
                            }
                        
                        ?> 
                  <div class="col-lg-4 col-12 mb-3">
                            <div class="product-thumb">
                                <a href="product-detail.html"> 
                                <?php
                                $sql="SELECT * from product where product_id=11";
                                $result = $conn-> query($sql);

                                if ($result-> num_rows > 0){
                                while($row = $result-> fetch_assoc()){ 
                                    ?>                  
                               <img src= "./admin/uploads/<?php echo $row['product_image'];?>"class="img-fluid product-image" alt="" >
                            
                                 
                        </a>

                                <div class="product-top d-flex">
                                    <a href="#" class="bi-heart-fill product-icon ms-auto"></a>
                                </div>

                                <div class="product-info d-flex">
                                    <div>
                                        <h5 class="product-title mb-0">
                                        <a href="#" class="product-title-link"><?php echo $row['product_name'];?></a>
                                        </h5>

                                        
                                    </div>

                                    <small class="product-price text-muted ms-auto">₹ <?php echo $row['price'];?></small>
                                </div>
                                <a href="product-detail.php?products=<?php echo $row['product_id'];?>" class="button <?php echo ($row['Total_quantity']==0)?'':'disabled'; ?>">view</a> 
                            </div>
                            <?php 
                            if($row['Total_quantity']==0)
                            {
                                echo('<span style="color:#FF0000;text-align:center;">out of stock!</span>');
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
            
            ?>         
            </section>

        </main>


        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.html">Little</a> Fashion</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- CART MODAL -->
        <div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header flex-column">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                <img src="images/product/evan-mcdougall-qnh1odlqOmk-unsplash.jpeg" class="img-fluid product-image" alt="">
                            </div>

                            <div class="col-lg-6 col-12 mt-3 mt-lg-0">
                                <h3 class="modal-title" id="exampleModalLabel">Tree pot</h3>

                                <p class="product-price text-muted mt-3">$25</p>

                                <p class="product-p">Quatity: <span class="ms-1">4</span></p>

                                <p class="product-p">Colour: <span class="ms-1">Black</span></p>

                                <p class="product-p pb-3">Size: <span class="ms-1">S/S</span></p>

                                <div class="border-top mt-4 pt-3">
                                    <p class="product-p"><strong>Total: <span class="ms-1">$100</span></strong></p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row w-50">
                            <button type="button" class="btn custom-btn cart-btn ms-lg-4">Checkout</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
    </html>