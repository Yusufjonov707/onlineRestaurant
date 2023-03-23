<?php include "../admin/partials/menu.php";?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']); 
        }
        ?>
        <form action="" method="post">
          <table>
              <tr>
                  <td>Full_name</td>
                  <td><input type="text" name="full_name" placeholder="Enter your name"></td>
              </tr>
              <tr>
                  <td>Username:</td>
                  <td>
                      <input type="text" name="username" placeholder="Enter your username">
                  </td>
              </tr>
              <tr>
                  <td>Password:</td>
                  <td>
                      <input type="password" name="password" placeholder="Enter your password">
                  </td>
              </tr>
              <tr>
                <td colspan="2">
                <button type="submit" name="submit" class="btn btn-success">Submit</button>    
                </td>
              </tr>
         </table>
        </form>
    </div>
</div>

<?php include "../admin/partials/footer.php";

if(isset($_POST['submit'])){
   $full_name = $_POST['full_name'];
   $username = $_POST['username'];
   $password = md5($_POST['password']); //password incribed

   $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username='$username',
    password='$password'";

    $res = mysqli_query($conn,$sql) or die(mysqli_error());
    if($res == TRUE){ 
        $_SESSION['add']="Admin seccessufully added";
        header("Location:".SITEURL."admin/manage-admin.php");
    }else{
        $_SESSION['add']="Failed to add admin";
        header("Location:".SITEURL."admin/add-admin.php");
    };
}