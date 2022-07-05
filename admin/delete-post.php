<?php
    session_start();
    include 'inc/config.php';

    $post_id = $_GET['id'];
    $cat_id = $_GET['cat_id'];
    
    $post_img = "SELECT image FROM post WHERE post_id = $post_id";
    $post_query = mysqli_query($con, $post_img);
    $post_result = mysqli_fetch_assoc($post_query);

    unlink("images/". $post_result['image'] );

    $del = "DELETE FROM post WHERE post_id = $post_id;";
    $del .= "UPDATE category SET post_count = post_count - 1 WHERE cat_id = $cat_id";

    $result = mysqli_multi_query($con, $del);

    if($result) {
        $_SESSION['post-delete'] = '<div class="alert alert-success">Post Deleted Successfully!</div>';
        header('Location:posts.php');
    } else {
        echo 'Failed';
    }
?>