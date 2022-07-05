<?php
session_start();
include 'inc/config.php';
if(isset($_POST['submit'])) {

    if(empty($_FILES['new_image']['name'])) {
        $image = $_POST['old_image'];
    } else {
        $name = $_FILES['new_image']['name'];
        $tmp_name = $_FILES['new_image']['tmp_name'];
        $size = $_FILES['new_image']['size'];
    
        $file_exp = explode('.', $name);
        $file_lower = strtolower(end($file_exp));
        $file_exts = array('png', 'jpg');
    
        $rename = date('Y') . '-' . rand(9,999) . '.' .$file_lower;
        $image = $rename;
        if(in_array($file_lower, $file_exts, $image)) {
            if($size < 200000) {
                move_uploaded_file($tmp_name, 'images/' . $image);
                
            } else {
                echo 'Image too big. less then 100kb';
            }
        } else {    
            echo 'Image must be png or jpg';
        }
    }

    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $old_category = $_POST['old_category'];
    $author = $_SESSION['id'];

    $query = "UPDATE post SET 
    title = '$title', 
    description = '$description', 
    image = '$image', 
    category = $category, 
    author = $author WHERE post_id = $post_id;";

    if($old_category != $category) {
        $query .= "UPDATE category SET post_count = post_count - 1 WHERE cat_id = $old_category;";
        $query .= "UPDATE category SET post_count = post_count + 1 WHERE cat_id = $category;";
    }

    $test = mysqli_multi_query($con, $query);
    if($test) {
        echo 'dfdsf';
    } else {
        echo 'ss';
    }

}


?>