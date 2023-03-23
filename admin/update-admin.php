<?php include "partials/menu.php";?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>
            <br>
            <?php 
            $id=$_GET['id'];
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";
            $res =mysqli_query($conn,$sql);

            if($res==TRUE){
                $count = mysqli_num_rows($res);
                if($count==1){
                  $row = mysqli_fetch_assoc($res);
                  $full_name = $row["full_name"];
                  $username = $row["username"];
                }else{
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }
            ?>
            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Full_name:</td>
                        <td>
                            <input type="text" name="full_name" value="<?=$full_name?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" value="<?=$username?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn btn-success">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>
<?php 
if(isset($_POST['submit'])){
   $id = $_POST['id'];
   $full_name = $_POST['full_name'];
   $username = $_POST['username'];

   $sql = "UPDATE tbl_admin SET
   full_name = '$full_name',
   username = '$username'
   WHERE id='$id'
   ";
   $res = mysqli_query($conn,$sql);
   if($res==True){
    $_SESSION['update'] = " <div class='success'> admin updated Successfully </div>";
    header("location:".SITEURL."admin/manage-admin.php");
   }else{
    $_SESSION['update'] = " <div class='error'> Failed to update</div>";
    header("location:".SITEURL."admin/manage-admin.php");
   }
}            
?>

<?PHP include "partials/footer.php";