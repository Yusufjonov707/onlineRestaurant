<?php include_once "../thapa/partiels-front/menu.php";
 $search  = $_POST['search'];     ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?=$search?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            $search  = mysqli_real_escape_string($conn,$_POST['search']);
            $sql = "SELECT * FROM tbl_food WHERE title like '%$search%' OR description LIKE '%$search%'";
            $res  = mysqli_query($conn,$sql);
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
                        <?php 
                         if(empty($image_name)){
                            echo "<div class='error'>Image not Avalibale</div>";
                        }else{
                        ?>
                        <div class="food-menu-img">
                            <img src="<?=SITEURL;?>images/food/<?=$image_name?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        </div>
                        <?php
                        }
                        ?>
                

                <div class="food-menu-desc">
                    <h4><?=$title?></h4>
                    <p class="food-price">$<?=$price?>.00</p>
                    <p class="food-detail">
                         <?=$description?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>


                    <?php
                }
            }else{
                echo "<div class='error'>Food not Found.</div>";
            }
            ?>
            <div class="clearfix"></div>

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include_once "../thapa/partiels-front/footer.php" ?>