<?php include "partials/menu.php"?>

    <!-- Menu Contant section starts -->
    <div class="menu-content">
        <div class="wrapper">
               <h1>Manage Admin</h1>
               <br>
               <strong>New Admin:</strong><a href="add-admin.php" class="btn btn-primary">Add Admin</a>
               <br><br>  
                <?php
               if(isset($_SESSION['add']))
               {
                 echo  $_SESSION['add'];
                 unset($_SESSION['add']);
               }
               if(isset($_SESSION['delete']))
               {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
               }
               if(isset($_SESSION['update']))
               { 
                echo $_SESSION['update'];
                unset($_SESSION['update']);
               }
               if(isset($_SESSION['user-not-found']))
               { 
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
               }
               ?>
               <br>
               <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
                <?php 
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn,$sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);

                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res)){
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username = $rows['username'];
                                ?>
                                <tr>
                                <td><?=$id?></td>
                                <td><?=$full_name?></td>
                                <td><?=$username?></td>
                                <td>  
                                    <a href="<?=SITEURL?>admin/update-password.php?id=<?=$id?>" class="btn btn-primary">Change password</a>
                                    <a href="<?=SITEURL?>admin/update-admin.php?id=<?=$id?>" class="btn btn-success">Update Admin</a>
                                    <a href="<?=SITEURL?>admin/delete-admin.php?id=<?=$id?>" class="btn btn-danger">Delete Admin</a>
                                </td>
                            </tr>
                          <?php   }
                        }else{

                        }
                    }
                ?>
               </table>
        </div>
    </div>
    <!-- Menu section end -->

<?php include "partials/footer.php" ?>