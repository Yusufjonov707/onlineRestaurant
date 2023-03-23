<?php include "partials/menu.php"?>

    <!-- Menu Contant section starts -->
    <div class="menu-content">
        <div class="wrapper">
               <h1>Manage Food</h1>
               <strong>New Food:</strong><a href="add-food.php" class="btn btn-primary">Add food</a>
               <br>
               <br>
               <?php
             if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }
             ?>
               <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
                <?php 
                $sql = "SELECT * FROM tbl_food";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                $number = 1;
                if($count>0){
                    foreach($res as $res){
                        $id = $res['id'];
                        $title = $res['title'];
                        $price = $res['price'];
                        $image_name = $res['image_name'];
                        $featured = $res['featured'];
                        $active = $res['active']; 
                        ?>
                <tr>
                    
                       <td><?=$number++?></td>
                       <td><?=$title?></td>
                       <td><?=$price?></td>
                       <td><?php
                       if($image_name==""){
                        echo "<div class='error'>No image here!</div>";
                       }else{
                        ?> <img src="../images/food/<?=$image_name?>" width="90px">
                        <?php
                       }
                       
                       ?></td>
                       <td><?=$featured?></td>
                       <td><?=$active?></td>
                       <td>
                       <a href="#" class="btn btn-success">Update Food</a>
                       <a href="#" class="btn btn-danger">Delete Food</a>
                    </td>
                    
                </tr>
                <?php 
                    }
                }else{
                    echo "<tr><td colspan='7' class= 'error'>Food not added yet!</td></tr>";
                }
                ?>
               
               </table>
        </div>
    </div>
    <!-- Menu section end -->

<?php include "partials/footer.php" ?>