<?php include_once "../thapa/partiels-front/menu.php";?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    } ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);

            
            if($count>0){
                foreach ($res as $res){
                    $id = $res['id'];
                    $title = $res['title'];
                    $image_name = $res['image_name'];
                ?>
                    <a href="category-food.php?category_id=<?=$id?>">
                    <div class="box-3 float-container">
    
                        <?php 
                        if(empty($image_name)){
                            echo "<div class='error'>Image not Avalibale</div>";
                        }else{
                        ?>
                            <img src="<?=SITEURL;?>images/category/<?=$image_name?>" alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                        
        
                        <h3 class="float-text text-white"><?=$title?></h3>
                    </div>
                    </a>
               <?php 
                }
            }else{
                echo "<div class='error'>Category not Added</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
            $res2= mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0){
                foreach($res2 as $res){
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
           </div>
                    <?php 
                }
            }else{
                echo "<div class='error'>No Food Available</div>";
            }
            ?>
      
            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

  <?php include_once "../thapa/partiels-front/footer.php" ?>