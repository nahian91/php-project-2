<?php
    include 'inc/config.php';

    $id = $_GET['id'];
    $delete = "DELETE FROM category WHERE cat_id = $id";
    $result = mysqli_query($con, $delete);
    if($result) {
        $_SESSION['category-delete'] = '<div class="alert alert-success">Category Deleted Successfully!</div>';
        header('Location:categorys.php');
    }
?>