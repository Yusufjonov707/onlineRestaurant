  <?php include_once "../thapa/partiels-front/menu.php"; 
    if(isset($_GET['category_id'])){
        $category_id = $_GET['category_id'];
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }else{
        header("Location:".SITEURL);
    }
  ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?=$category_title?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                <?php 
                $sql = "SELECT * FROM tbl_food WHERE category_id=$category_id";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                        foreach($res as $res){
                            $id = $res['id'];
                            $title = $res['title'];
                            $price = $res['price'];
                            $description = $res['description'];
                            $image_name = $res['image_name'];
                            ?>
                            <div class="food-menu-box">
                                          <div class="food-menu-img">
                                            <?php
                                          if(empty($image_name)){
                                              echo "<div class='error'>Image not Avalibale</div>";
                                                 }else{
                                              ?>
                                             <img src="<?=SITEURL;?>images/food/<?=$image_name?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                           }
                                             ?>
                                          </div>

                                          <div class="food-menu-desc">
                                              <h4><?=$title?></h4>
                                              <p class="food-price">$<?=$price?>.00</p>
                                              <p class="food-detail">
                                                  <?=$description?>
                                              </p>
                                              <br>

                                              <a href="order.php?food_id=<?=$id?>" class="btn btn-primary">Order Now</a>
                                          </div>
                                      </div>
                            <?php 
                        }
                }else{
                    echo "Food not available";
                }
                ?>
                </div>
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include_once "../thapa/partiels-front/footer.php" ?>