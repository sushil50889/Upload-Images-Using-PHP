<?php
session_start();
require("connection.php");

if(isset($_POST["submit"])){
    
    $target_file = "./uploads/".basename($_FILES["image"]["name"]);
    $image_type = pathinfo($target_file,PATHINFO_EXTENSION);
    $image = $_FILES["image"]["name"];
    
    $sql = "INSERT INTO `images` (`image_id`, `image_name`, `image_ext`) VALUES (NULL, '$image', '$image_type')";
    $sql=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
    $id = mysqli_insert_id($conn);
    $target_file = "./uploads/"."some_name_".$id.".".$image_type;
    
    if($sql){
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $_SESSION["msg"]="image uploaded successfuly";
    } else {
        $_SESSION["msg"]="Something Wrong. Unable to add image";
    }
    
    header("location:test.php");
    exit();
}?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>File Upload</title>
</head>
<body>
    <h1>Upload a File</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image"/>
        <input type="submit" name="submit"/>        
    </form>
    
    <p>
        <?php   
            echo $_SESSION["msg"];
            $_SESSION["msg"] = '';
        ?> 
    </p>
    
</body>
</html>

