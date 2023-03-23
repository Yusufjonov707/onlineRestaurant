<?php 
 if(!isset($_SESSION['user'])){

    $_SESSION['no-login-massage'] = "<div class='error'>Please logi to access admin panel</div>";
    header("location:".SITEURL."admin/login.php");
}

?>