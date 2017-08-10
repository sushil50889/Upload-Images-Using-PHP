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

    header("location:index.php");
    exit();
}
?>
