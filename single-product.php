<!DOCTYPE html>
<html>
   <head>
      <?php
         $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
         $host = $_SERVER['HTTP_HOST'];
         $currentUrl = $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
         require_once "head.php";
         require_once "config.php";
         $p_id = $_GET["id"];
         $_SESSION["single-product-id"] = $p_id;
         $sql = "SELECT * FROM item where id='$p_id' and disable='0'";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
             while ($row = $result->fetch_assoc()) {
                 $p_id = $row["id"];
                 $name = $row["name"];
                 $price = $row["price"];
                 $shop = $row["shop"];
                 $img1 = $row["img1"];
                 $img2 = $row["img2"];
                 $img3 = $row["img3"];
                 $img4 = $row["img4"];
                 $shop_id = $row["shop_id"];
                 $des_short = $row["des_short"];
                 $max_price = $row["max_price"];
                 $review = $row["reviews"];$specs = $row["specs"];
                 $sto_=$row['stock'];$size=$row['size'];$discount=$row['discount'];$num=$row['num'];
             }
             /**************/

             if(isset($_SESSION['me'])){
               $me=$_SESSION['me'];
               $sql="SELECT * from history where p_id=$p_id and u_id=$me";
               $result = $conn->query($sql);
                 if ($result->num_rows ==1) {}
                  else{
                  $sql="INSERT into history (u_id,p_id) values ($me,$p_id)";
                  $conn->query($sql);
                 }
             }
             /****************/
         } else {
             header("Location:404.php");
         }
         ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
      <title><?php echo $name;?></title>
   </head>
   <body>
      <?php require_once "header.php"; ?>
      <section class="container flex_ single-product mobile-flex-direction margin-top-10">
         <div class=" flex_ mobile-flex-direction" style="flex-direction: row-reverse;">
            <div class="flex_ align-items justify-content-center product-big-image">
               <img id="mainImage" src="prod/<?php echo $img1; ?>">
               <div class="arrows_left_right">
                  <div class="p_arrow_left" onclick="changeImage('left')">
                     <i class="fas fa-angle-left"></i>
                  </div>
                  <div class="p_arrow_right" onclick="changeImage('right')">
                     <i class="fas fa-angle-right"></i>
                  </div>
               </div>
            </div>
            <div class="flex_ flex-direction mobile-row">
               <div class="single-product-imgs">
                  <img src="prod/<?php echo $img1; ?>" class='image__1'>
               </div>
               <div class="single-product-imgs">
                  <img src="prod/<?php echo $img2; ?>" class='image__2'>
               </div>
               <div class="single-product-imgs">
                  <img src="prod/<?php echo $img3; ?>" class='image__3'>
               </div>
               <div class="single-product-imgs">
                  <img src="prod/<?php echo $img4; ?>" class='image__4'>
               </div>
            </div>
         </div>
         <div class="space"></div>
         <div>
            <div class="single-product-det">
               <p class="shop_name"><?php echo $shop; ?>'s Shop</p>
               <h2 class="single-product-name margin-top-10"><?php echo $name; ?></h2>
               <div class="flex_ align-items margin-top-20">
                  <?php
                     if($num == 0 or $sto_==0){
                                         echo '<p class="instock">Out Of Stock</p>';
                                     }else{
                                         echo '<p class="instock">In Stock</p>';
                                     }
                                       ?>
                  <div class="space"></div>
                  <?php if($num>10){echo "<span style='color:#25D366'>".$num." Products Left</span>";

               } elseif($num<=10 && $num>0){echo "<span style='color:var(--red)'>HURRY UP! Only ".$num." Products Left</span>";}elseif($num==0){echo "<span style='color:var(--red)'>STOCK OUT! Check back later</span>";}?>
               </div>
               <!--<p class="prod-des margin-top-20"><?php echo $des_short; ?></p>-->
               <div class="flex_ margin-top-20 align-items">
                  <?php 
                     if($discount!=0){
                        echo '<p class="full-price">$'.$max_price.'</p>
                                       <div class="space"></div>';
                     }
                                       ?>
                  <p class="dis-price">$<?php echo $price; ?></p>
                  <?php
                  if($discount!=0){
                        echo '<p class="full-discount">'.$discount.'% OFF</p>
                                       ';
                     }
                  ?>
               </div>
               <!--<input type="text" class="size_paste" style="display: none;">-->
               <?php
                  if($size!=""){
                     echo "<select class='size_paste margin-top-20'><option value='0'>--SELECT SIZE--</option>";
                     $sizeArray = explode(',', $size);
                    
                     foreach ($sizeArray as $sizeItem) {
                      echo '<option class="size-button" value="'. $sizeItem .'">' . $sizeItem . '</option>';
                  }echo "</select>";
                  
                  }
                  
                  
                  
                  
                  if($sto_=='0' or $num==0){
                                      echo '<br><span class="outstock">Out Of Stock</span>';
                                  }else{
                                      echo '<div class=" flex_  flex-direction"> <div class="flex_ flex-wrap margin-top-20 mobile-use"> <div class="flex_ div_outline align-items justify-content"> <div class="flex_ justify-content-center qty_dec"> <i class="fas fa-minus"></i> </div> <div class="flex_ justify-content-center"> <div class="qty_increased">1</div> </div> <div class="flex_ justify-content-center qty_inc"> <i class="fas fa-plus"></i> </div> </div> <div class="space"></div> <div class="width-100 width_-100"><button class="buy_product_now" p-id='.$p_id.' >Buy Now</button></div> <div class="space"></div> <div class="flex_ width-100 width_-100"> <button class="add_cart_outline add_to_cart" data-pid='.$p_id.'>Add to Cart</button> </div> <div class="space"></div> <div class="flex_"> <button class="add_cart_outline square add_to_wish" title='.$p_id.'> <i class="fas fa-heart" style="color:var(--p);"></i> </button> </div> </div> </div>';
                                  }
                                    ?>
              
               <div class="container margin-top-20 flex_ p-info flex_wrap">
                  <div class="flex_ flex-direction justify-content-center align-items">
                     <img src="assets/images/replace.png">
                     <a href="#">7 Days Return</a>
                  </div>
                  <div class="flex_ flex-direction justify-content-center align-items">
                     <img src="assets/images/free.png">
                     <a href="#">Free Delivery</a>
                  </div>
                  
                  <div class="flex_ flex-direction justify-content-center align-items">
                     <img src="assets/images/war.png">
                     <a href="#">1 Year Warranty</a>
                  </div>
                  <div class="flex_ flex-direction justify-content-center align-items">
                     <img src="assets/images/delivery.png">
                     <a href="#">Pay on Delivery</a>
                  </div>
                  <div class="flex_ flex-direction justify-content-center align-items">
                     <img src="assets/images/top.png">
                     <a href="#">Top Brands</a>
                  </div>
                  <div class="flex_ flex-direction justify-content-center align-items">
                     <img src="assets/images/fast.png">
                     <a href="#">Fast Delivery</a>
                  </div>
               </div>
                <!---------------------------->
               <div class="flex_ margin-top-20 flex-direction">
                  <!--<p class="colors_">Share </p>-->
                  <div class="margin-top-10 flex_ share_product">
                     <a class="share_icon_div share-fb" target="blank" href="https://www.facebook.com/sharer.php?u=<?php echo $currentUrl;?>"><i class="fab fa-facebook"></i></a>
                     <a class="share_icon_div share-tw" target="blank" href="http://twitter.com/share?url=<?php echo $currentUrl;?>"><i class="fab fa-twitter"></i></a>
                     <a class="share_icon_div share-li" target="blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $currentUrl;?>"><i class="fab fa-linkedin"></i></a>
                     <a class="share_icon_div share-wh" target="blank" href="https://api.whatsapp.com/send?text=<?php echo $currentUrl;?>"><i class="fab fa-whatsapp"></i></a>
                  </div>
               </div>
             <!--  <div class="flex_ align-items margin-top-20">
                  <i class="far fa-hand-point-right i_big"></i>  <p class="text-primary">7 days Return/Replacement</p>
                  </div>
               -->
            </div>
         </div>
      </section>
      <br>
      <section class="container margin-top-20">
         <div class="tabs_">
            <span class="tab-des active-link-tab" title="p-des">Description</span>
            <span class="tab-spec " title="p-specs">Specification</span>
            <span class="tab-rev" title="p-rev">Reviews</span>
         </div>
         <div class="p-rev">
         <div class="review_cont flex_ mobile-flex-direction">
            <div class="review_cont_left">
               
               <?php
                  $sql =
                      "SELECT star from review where p_id='$p_id'";
                  $result = $conn->query($sql);
                  $star_5 = 0;
                  $star_4 = 0;
                  $star_3 = 0;
                  $star_2 = 0;
                  $star_1 = 0;
                  if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                  if($row['star']==5){
                  $star_5 = intval($star_5)+1;
                  }elseif($row['star']==4){
                  $star_4 = intval($star_4)+1;
                  }
                  elseif($row['star']==3){
                  $star_3 = intval($star_3)+1;
                  }elseif($row['star']==2){
                  $star_2 = intval($star_2)+1;
                  }elseif($row['star']==1){
                  $star_1 = intval($star_1)+1;
                  }
                  }
                  }
                  
                  $total_rev = $star_5 + $star_4 + $star_3 + $star_2 + $star_1;
                  if($total_rev==0){
                  $total_rev=1;
                  }
                  ?>
               <div class="avg_star flex_ align-items">
                  <div class="avg_star_">
                     <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i>
                  </div>
               </div>
               <div class="flex_ margin-top-20 align-items">
                  <progress class="star_5" max="100" value="<?php echo ($star_5 /
                     $total_rev) *
                     100; ?>"></progress>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h4><?php echo number_format(($star_5 / $total_rev) * 100,0); ?>%</h4>
                  &nbsp;&nbsp;&nbsp;
                  <span><?php echo $star_5; ?></span>
               </div>
               <div class="flex_ margin-top-10 align-items">
                  <progress class="star_4" max="100" value="<?php echo ($star_4 /
                     $total_rev) *
                     100; ?>"></progress>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h4><?php echo number_format(($star_4 / $total_rev) * 100,0); ?>%</h4>
                  &nbsp;&nbsp;&nbsp;
                  <span><?php echo $star_4; ?></span>
               </div>
               <div class="flex_ margin-top-10 align-items">
                  <progress class="star_3" max="100" value="<?php echo ($star_3 /
                     $total_rev) *
                     100; ?>"></progress>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h4><?php echo number_format(($star_3 / $total_rev) * 100,0); ?>%</h4>
                  &nbsp;&nbsp;&nbsp;
                  <span><?php echo $star_3; ?></span>
               </div>
               <div class="flex_ margin-top-10 align-items">
                  <progress class="star_2" max="100" value="<?php echo ($star_2 /
                     $total_rev) *
                     100; ?>"></progress>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h4><?php echo number_format(($star_2 / $total_rev) * 100,0); ?>%</h4>
                  &nbsp;&nbsp;&nbsp;
                  <span><?php echo $star_2; ?></span>
               </div>
               <div class="flex_ margin-top-10 align-items">
                  <progress class="star_1" max="100" value="<?php echo ($star_1 /
                     $total_rev) *
                     100; ?>"></progress>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <h4><?php echo number_format(($star_1 / $total_rev) * 100,0); ?>%</h4>
                  &nbsp;&nbsp;&nbsp;
                  <span><?php echo $star_1; ?></span>
               </div>
               <div class="write_review margin-top-20">
                  <p class="bold margin-top-20">Write Review</p>
                  <?php
                     $p_id = $_SESSION["single-product-id"];
                     $u_id = $_SESSION["me"];
                     $sql = "SELECT COUNT(u_id) AS num FROM review WHERE u_id = '$u_id' and p_id='$p_id'";
                     
                     $result = $conn->query($sql);
                     
                     $num = $result->fetch_assoc();
                     $a = $num["num"];
                     
                     if ($a == 0) {
                         echo '
                           <div class="flex_ margin-top-20 feedback_star">
                                             <i class="fas fa-star" title="1"></i>
                                             <i class="fas fa-star" title="2"></i>
                                             <i class="fas fa-star" title="3"></i>
                                             <i class="fas fa-star" title="4"></i>
                                             <i class="fas fa-star" title="5"></i>
                                          </div>
                                          <input type="text" name="" class="star_count" hidden>
                                          <div class="form_input margin-top-20">
                                             <label for="">Title*</label>
                                             <input type="Title" placeholder="Title" class="review_title" style="width:400px;">
                                          </div>
                                          <div class="form_input margin-top-10">
                                             <label for="">Review*</label>
                                             <textarea placeholder="Review" class="review_feedback" style="width:400px;"></textarea>
                                          </div>
                                          <button class="margin-top-10 submit_review" style="width:100px;">Post</button>
                           ';
                     } else {
                         echo '<p class="margin-top-20">You already reviewed this item.<br>To manage review visit <a href="reviews.php">your reviews</a>.</p>';
                     }
                     ?>
               </div>
            </div>
            <div class="review_cont_right">
               <?php
                  $sql = "SELECT cust.name as name,cust.lname as lname,review.review as review,review.date as date,review.star as star,review.short_rev as title from cust,review where cust.id=review.u_id and review.p_id='$p_id'";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                          $name = $row["name"] . " " . $row["lname"];
                          $date = date("d F Y", strtotime($row["date"]));
                          $title = $row["title"];
                          $review = $row["review"];
                          $star = $row["star"];
                          if ($star == "1") {
                              $starr = '<div>
                                             <i class="fas fa-star"></i>
                                          </div>';
                          } elseif ($star == "2") {
                              $starr =
                                  '<div>
                                             <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                          </div>';
                          } elseif ($star == "3") {
                              $starr =
                                  '<div>
                                             <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                          </div>';
                          } elseif ($star == "4") {
                              $starr = '<div>
                                             <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                          </div>';
                          } elseif ($star == "5") {
                              $starr = '<div>
                                             <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                          </div>';
                          }
                          echo '
                                             <div class="review_ margin-top-20">
                                       <div class="reviwer flex_ align-items">
                                          <img src="assets/images/user.png">
                                          &nbsp;&nbsp;
                                          <h3>' .
                              $name .
                              '</h3>
                                       </div>
                                       <div class="flex_ align-items margin-top-10">
                                       ' .
                              $starr .
                              '
                                          
                                          &nbsp;&nbsp;<span class="bold">' .
                              $title .
                              '</span>
                                       </div>
                                       <p class="review_time margin-top-10">' .
                              $date .
                              '</p>
                                       <p class="verified_purchase margin-top-10 bold">Verified Purchase</p>
                                       <p class="main_review margin-top-10">
                                          ' .
                              $review .
                              '
                                       </p>
                                       <div class="review_helpful margin-top-20 flex_ align-items">
                                          <p class="bold">HELPFUL</p>
                                       </div>
                                    </div>
                                             ';
                      }
                  } else {
                     echo "<p style='font-size:13px;' class='bold'><br>NO REVIEWS YET!</p>";
                  }
                  ?>
            </div>
         </div>
         </div>
         <div class="p-specs margin-top-20">
            <?php
if($specs==""){
   echo '<p style="font-size:13px;" class="bold">NO SPECIFICATION FOUND FOR THIS PRODUCT!</p>';
}else{
     $pairs = explode(',', $specs);

    echo '<table>';
    foreach ($pairs as $pair) {
        list($key, $value) = explode(':', $pair);
        echo '<tr><th style="border: 1px solid #dddddd; background-color: #f8f8f8; text-align: left; padding: 10px;">' . $key . '</th><td style="border: 1px solid #dddddd; text-align: left; padding: 10px;">' . $value . '</td></tr>';
    }
    echo '</table>';
}
            ?>
         </div>
         <div class="p-des margin-top-20">
             <p><?php echo $des_short;?></p>
         </div>
         
         
      </section>
      <section class="container">
         <a class="flex_ align-items color_pri justify-content-center">More FROM &nbsp;&nbsp;&nbsp;<i class="fas fa-angle-right" style="color:var(--p);"></i></a>
         <h2 class="flex_ align-items color_head justify-content-center margin-top-10"><?php echo $shop; ?></h2>
         <div class="margin-top-20 owl-carousel">
            <!---->
            <?php
               $_SESSION["fetch_id"] = 0;
               $sql = "SELECT * FROM `item` WHERE disable='0' and shop_id='$shop_id'";
               
               $result = $conn->query($sql);
               
               if ($result->num_rows > 0) {
                   // output data of each row
                   while ($row = $result->fetch_assoc()) {
                       $id_ = $row["id"];
                       $name = $row["name"];
                       $price = $row["price"];
                       $img1 = $row["img1"];
                       $star = $row["star"];
                       $review = $row["reviews"];
                       $dis = $row["discount"];$max_price = $row["max_price"];
                       echo '<div class="product">
                     <a href="single-product.php?id=' .
                           $id_ .
                           '"> <div class="product_img">
                         <img src="prod/' .
                           $img1 .
                           '" class="transform">';
                          if ($dis > 0) {
               echo '<p class="discount">' . $dis . '% OFF</p>';
               }
                  echo '<button class="btn-outline-heart">
                  <img src="assets/images/heart.svg" title="Add to Wishlist">
                  </button>
                      </div></a>
                      <div class="product_des">
                         <p class="product_name">' .
                           $name .
                           '</p>
                         <div class="flex_ padding">
                            <p class="product_stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i></p>
                            &nbsp;&nbsp;
                            <p class="product_rev">(' .
                           $review .
                           ' Reviews)</p>
                         </div>
                         <div class="flex_ padding margin-bottom-20 margin-top-10 justify-align">
                            <div>';
                  if ($row['stock'] == 0 or $row['num'] == 0) {
               echo '<button class="btn-outline margin-top-10 p_no_stock" style="color:var(--red);border:1px solid var(--red);">OUT OF STOCK</button>';
               }else{
               echo '<button class="btn-outline margin-top-10 add_cart" data-pid='.$id_.'>Add to Cart</button>';
               }
                  
                  
                  
                  echo '</div>
                            <p class="product_price">';
               
                  if ($dis > 0) {
               echo '<span class="pr_dis">$' . $max_price . '</span>';
               }echo '$'.$price.'</p>
                         </div>
                      </div>
                   </div>';
                   }
               }
               ?>
            <!----> 
         </div>
      </section>
      <?php include "footer.php"; ?>
      <script>
         // Initialize the owl carousel plugin
         $('.owl-carousel').owlCarousel({
           loop:true,
           margin:10,
           nav:true,
           autoplay:true, // Add this option to enable autoplay
           autoplayTimeout:3000, // Set the timeout to 3 seconds
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:2
               }, 700:{
                   items:2
               }, 900:{
                   items:3
               },
               1200:{
                   items:4
               }
           }
         })
      </script>
      <!-- Your HTML code remains the same -->
      <script>
         var current = 1; // Track the currently displayed image
         var total = 4; // Set the total number of images
         
         function changeImage(direction) {
          if (direction === 'left') {
              if (current !== 1) {current -= 1;
                  var image = $(".image__" + current).attr("src");
                  
                  console.log(current);
                  $(".product-big-image img").fadeOut(300, function () {
                      $(this).attr("src", image).fadeIn(300);
                  });
              }
          } else if (direction === 'right') {
              if (current !== total) {current += 1;
                  var image = $(".image__" + current).attr("src");
                  console.log(image);
                  
                  console.log(current);
                  $(".product-big-image img").fadeOut(300, function () {
                      $(this).attr("src", image).fadeIn(300);
                  });
              }
          }
         }
         
      </script>
   </body>
</html>