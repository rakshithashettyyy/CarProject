<!DOCTYPE html>
<html>
   <head>
      
      <?php require "inc/head.php";?>
      <title>All Reviews</title>
   </head>
   <body>
    
      <?php require "inc/nav.php";?>
      <div class="flex_">
        
         <?php require "inc/sidebar.php";?>
         <div class="right">
          <div class="padding">
            
                     <h3 class="page-title">All Reviews</h3><br>
                  
            <div class="reviews">
            <?php
            $shop_id=$_SESSION['shop_id'];
               $sql = "SELECT * from review where p_id in(select id from item where shop_id='$shop_id')";
               $result = $conn->query($sql);

               if ($result->num_rows > 0) {
                   // output data of each row
                   while ($row = $result->fetch_assoc()) {
                       $name = $row["name"] . " " . $row["lname"];
                       $date = date("d F Y", strtotime($row["date"]));
                       $title = $row["title"];
                       $review = $row["review"];
                       $star = $row["star"];
                        $p_id = $row["p_id"];
                        $id=$row['id'];
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
                                       
                                       <h4>' .
                           $name .
                           '</h4>
                                    </div>
                                    <div class="flex_ align-items margin-top-10">
                                    ' .
                           $starr .
                           '
                                       
                                       
                                    </div><div class="flex_ align-items margin-top-10">
                                    <p class="bold">' .
                           $title .
                           '</p>
                                    </div>
                                    <p class="review_time margin-top-10">' .
                           $date .
                           '</p>
                                    <p class="verified_purchase margin-top-10 bold"><a href="../single-product.php?id='.$p_id.'">VIEW PRODUCT</a></p>
                                    <p class="main_review margin-top-10">
                                       ' .
                            $review .
                           '
                                    </p>
                                    <div class="review_helpful margin-top-20 flex_ align-items">
                                       <button class="btn btn-danger review_abuse" title="'.$id.'">REPORT ABUSE</button>
                                    </div>
                                 </div><br>
                                          ';
                   }
               } else {
                   echo '<p class="margin-top-20">No reviews yet!</p>';
               }
               ?>
            </div>
            </div>
         </div>
      </div>
     
   </body>
</html>