<?php 
include "../admin/partials/menu.php";?>
<div class="main-content">
    <div class="wrapper">
       <h1>Change password</h1> 
       <br><br>
        <?php  
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        ?>
       <form action="" method="post">
            <table>
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="Current_password" placeholder="Current Password"></td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="Old Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                           <input type="hidden" name="id" value="<?=$id?>"> 
                           <input type="submit" class="btn btn-primary" name="submit" value="Change Password"> 
                    </td>
                </tr>
            </table>
       </form>
    </div>
</div>
<?php 
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password =md5($_POST['confirm_password']);
                            
        
        $sql="SELECT * FROM tbl_admin WHERE id='$id' AND password='$current_password'";

        $res = mysqli_query($conn,$sql);

        if($res==true){
            $count=mysqli_num_rows($res);
            if($count==15){
                if($new_password==$confirm_password){
                    echo "passwrod match";
                }else{
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password not matched.</div>";
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }else{
                $_SESSION['user-not-found'] = "<div class='error'>user not found.</div>";
                header("location:".SITEURL."admin/manage-admin.php");
            }     

        }
    }
?> 




<?php include "../admin/partials/footer.php";
?>