<?php include "../admin/partials/menu.php";?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="category title">
                    </td>
                </tr>
                <tr>
                    <td>Select image:</td>
                    <td><input type="file" name="image"></td>
                </tr>
                <tr>
                          <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="yes">Yes
                        <input type="radio" name="featured" value="no">No
                    </td>
                </tr>
                <tr>
                <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add" class="btn btn-success">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit'])){
               $title = $_POST['title'];
               if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
               }else{
                $featured = "No";
               }
               if(isset($_POST['active'])){
                $active = $_POST['active'];
                }else{
                 $active = "No";
                }
                if(isset($_FILES['image'])){
                    $image_name= $_FILES['image']['name'];
                    $ext = end(explode('.',$image_name));
                    $image_name = "Food_category_".rand(000,999).'.'.$ext;
                    $source_path=$_FILES['image']['tmp_name'];
                    $destination_path ="../images/category/".$image_name;
                    $upload = move_uploaded_file($source_path,$destination_path);
                    if($upload==false){
                        $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                        header("location:".SITEURL."admin/add-category.php");
                        die();
                    }
                }else{
                    $image_name="";
                }
                $sql ="INSERT INTO tbl_category SET
                title = '$title',
                image_name = '$image_name',
                featured='$featured',
                active='$active'
                ";

            $res = mysqli_query($conn,$sql);
                
            if($res==true){
                $_SESSION['add']="<div class='success'>Category added successfully</div>";
                header("location:".SITEURL."admin/manage-category.php");
            }else{
                $_SESSION['add']="<div class='error'>Category failed successfully</div>";
                header("location:".SITEURL."admin/manage-category.php");
            }
            }
        ?>
    </div>
</div>




<?php include "../admin/partials/footer.php";?>