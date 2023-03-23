<?php include "../admin/partials/menu.php";
error_reporting(0);
?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>
             <?php
             if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
             }
             ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="title" placeholder="Title of food">
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="description"  cols="30" rows="5" placeholder="Description of the food"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td>
                            <input type="number" name="price">
                        </td>
                    </tr>
                     <tr>
                        <td >Select image:</td>
                        <td>
                            <input type="file" name="image">
                        </td>
                     </tr>
                     <tr>
                        <td>Category:</td>
                        <td>
                            <select name="category">
                                <?php
                                $sql = "SELECT * FROM tbl_category WHERE active='yes'"; 
                                $res = mysqli_query($conn,$sql);
                                $count = mysqli_num_rows($res);
                                if($count>0){
                                    foreach($res as $res){
                                        $id = $res['id'];
                                        $title = $res['title'];
                                        ?> 
                                     <option value=<?=$id?>><?=$title?></option>
                                        <?php
                                    };
                                }else{
                                    ?>
                                    <option value="0">No category found</option>
                                    <?php 
                                }
                                ?>
                            </select>
                        </td>
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
                            <input type="submit" name="submit" value="Add Food " class="btn btn-success">
                        </td>
                     </tr>
                </table>
            </form>
            <?php
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }else{
                    $featured ="No";
                }
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }else{
                    $active ="No";
                }
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    if(!empty($image_name)){
                        $ext = explode('.',$image_name);
                        $image_name = "Food-name-".rand(0000,9999).".".$ext['1'];
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/food/".$image_name;
                        $upload = move_uploaded_file($src,$dst);
                    }
                }else{
                        $image_name = "";
                    }  
                    $sql2 = "INSERT INTO tbl_food SET
                    title = '$title',
                    description = '$description',
                    price = '$price',
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'";

                    $res2 = mysqli_query($conn,$sql2);
                    header("Location:".SITEURL."admin/-food");
                            
               }
                 
            ?>
        </div>
    </div>
<?php include "../admin/partials/footer.php";?>