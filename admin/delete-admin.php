<?php   

    include "../config/constents.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    $res = mysqli_query($conn,$sql);
     
    if($res==TRUE)
    {
       $_SESSION['delete'] = "<div class='success'>Admin successufully deleted.</div>";
       header("Location:".SITEURL."admin/manage-admin.php");
    }
    else{
        $_SESSION['delete'] = "Failed to deleting admin";
    }