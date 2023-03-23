  <?php include_once "../thapa/partiels-front/menu.php" ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                foreach($res as $res){
                    $id = $res['id'];
                    $title = $res['title'];
                    $image_name = $res['image_name'];
                    ?>
                    <a href="category-food.php">
                        <div class="box-3 float-container">
                            
                        <?php 
                        if(empty($image_name)){
                            echo "<div class='error'>Image not Avalibale</div>";
                        }else{
                            ?> <img src="<?=SITEURL;?>images/category/<?=$image_name?>" alt="Pizza" class="img-responsive img-curve">
                            <?php
                        }?>
                        <h3 class="float-text text-white"><?=$title?></h3>
                        </div>
                    </a>
                   <?php 
                }
            }else{
                "<div class='error'></div>";
            }
            ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include_once "../thapa/partiels-front/footer.php" ?>