<?php include "../config/constents.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login" >
        <h1 class="text-center" >Login</h1>
        <?php if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }  
        if(isset($_SESSION['no-login-massage'])){
            echo $_SESSION['no-login-massage'];
            unset($_SESSION['no-login-massage']);
        }
        ?>
        <form action="" method="post">
            Username:
            <input type="text" name="username" placeholder="Enter Username">
            Password:
            <input type="password" name="password" placeholder="Enter password"><br>
            <input type="submit" name="submit" value="submit" class="btn btn-success">
        </form>
        <p>Created By Baxodir Yusufjonov</p>
    </div>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
   $username = $_POST['username'];
   $password = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count==1){
        $_SESSION['login']= "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username; 
        header("location:".SITEURL."admin");
     }else{
         $_SESSION['login']= "<div class='error'>Failed to login</div>";
         header("location:".SITEURL."admin/login.php");
    }

}
?>