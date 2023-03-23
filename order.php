 <?php include_once "../thapa/partiels-front/menu.php";
    if(isset($_GET['food_id'])){
        $food_id = $_GET['food_id'];
        $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
            if($count==1){
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }else{

            }
        }else{
        header('location:'.SITEURL); 
    }
 ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="post" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

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
                        <h3><?=$title?></h3>
                        <input type="hidden" name="food" value="<?=$title?>">
                        <p class="food-price">$<?=$price?>.00</p>
                        <input type="hidden" name="price" value="<?=$price?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Baxodir Yusufjonov" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9989XXXXXXXXX" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@Baxodir.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 
            if(isset($_POST['submit'])){
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $order_date = date("Y-m-d h:i:sa");
                $status = "Ordered";
                $costumer_name = $_POST ['full-name'];
                $costumer_contact = $_POST['contact'];
                $costumer_email = $_POST['email'];
                $costumer_address = $_POST['address'];

                $sql = "INSERT INTO tbl_order SET 
                food = '$food',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status', 
                costumer_name =  '$costumer_name',
                costumer_contact =  '$costumer_contact',
                costumer_email =  '$costumer_email',
                costumer_address =  '$costumer_address'
                ";
                
                $res = mysqli_query($conn,$sql);
                
                if ($res==TRUE){
                    $_SESSION['order'] = "<div class='success'>Successfully saved</div>";
                    header("location:".SITEURL);
                }else{
                    $_SESSION['order'] = "<div class='success'>Failed to save</div>";
                    header("location:".SITEURL);
                }
             } 
            
            
                
                
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include_once "../thapa/partiels-front/footer.php" ?>