<?php
    include 'inc/config.php';

    $id = $_GET['id'];
    $delete = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($con, $delete);
    if($result) {
        $_SESSION['user-delete'] = '<div class="alert alert-success">User Deleted Successfully!</div>';
        header('Location:index.php');
    }
?>