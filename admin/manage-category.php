<?php include "partials/menu.php"?>

    <!-- Menu Contant section starts -->
    <div class="menu-content">
        <div class="wrapper">
               <h1>Manage category</h1>
               <br>
               <?php 
                  if(isset($_SESSION['add'])){
                      echo $_SESSION['add'];
                      unset($_SESSION['add']);
                  }
                ?>
               <strong>New category:</strong><a href="<?php echo SITEURL ?>admin/add-category.php" class="btn btn-primary">Add category</a>
               <br>
               <br>
               <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                <?php 
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                    foreach($res as $res){
                        $id = $res['id'];
                        $title = $res['title'];
                        $image_name = $res['image_name'];
                        $featured = $res['featured'];
                        $active = $res['active'];
                        ?> 
                           <tr>
                    <td><?=$id?></td>
                    <td><?=$title?></td>
                    <td>
                        <?php 
                        if($image_name!=""){
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?=$image_name?>" alt="" width="100px"> 
                            <?php 
                        }else{
                            echo "<div class='error'>Image is not given </div>";
                        }
                        ?>
                    </td>
                    <td><?=$featured?></td>
                    <td><?=$active?></td>
                    <td>
                        
                    <a href="#" class="btn btn-success">Update Category</a>
                    <a href="#" class="btn btn-danger">Delete Category</a>
                
                    </td>
                </tr>
                        <?php 
                    }
                }else{
                    ?> 
                    <tr>
                        <td colspan="6">
                            <div class="error">No category Added</div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
             
               </table>
        </div>
    </div>
    <!-- Menu section end -->

<?php include "partials/footer.php" ?>