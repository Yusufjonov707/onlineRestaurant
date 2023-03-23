<?php include "partials/menu.php"?>

        <!-- Menu Contant section starts -->
        <div class="menu-content">
        <div class="wrapper">
               <h1>Dashbord</h1>
               <br>
          <?php if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
         }?>
         <br>
               <div class="col-4 text-center">
                    <?php 
                    $sql = "SELECT * FROM tbl_category";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h2><?=$count?></h2>
                    <br>
                    Categories
               </div>
               <div class="col-4 text-center">  
                    <?php 
                    $sql = "SELECT * FROM tbl_food";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h2><?=$count?></h2>
                    <br>
                    Foods
               </div>
               <div class="col-4 text-center">
               <?php 
                    $sql = "SELECT * FROM tbl_order";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    ?>
                    <h2><?=$count?></h2>
                    <br>
                    Total orders
               </div>
               <div class="col-4 text-center">
               <?php 
                    $sql = "SELECT SUM(total) AS Total FROM tbl_order";
                    $res = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($res);
                    $total_rev = $row['Total'];
                    ?>
                    <h2>$<?=$total_rev?>.00</h2>
                    <br>
                    Revenue Ganerated
               </div>
            <div class="clearfix"></div>
            </div>
        </div>
        <!-- Menu section end -->
        <?php include "partials/footer.php" ?>