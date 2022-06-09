<?php
    session_start();

    if(!isset($_SESSION['email'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <section class="admin">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 text-center">
                    <div class="admin-title bg-secondary p-3 text-white">
                        <h2>Admin Panel</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xxl-3">
                    <div class="list-group">
                        <ul class="list-group">
                        <li class="list-group-item active">Sidebar Menu</li>
                        <li class="list-group-item"><a href="posts.php" class="text-dark  text-decoration-none">Posts</a></li>
                        <li class="list-group-item"><a href="categorys.php" class="text-dark  text-decoration-none">Categorys</a></li>

                        <?php if($_SESSION['role'] == 0) {
                        ?>
                            <li class="list-group-item"><a href="users.php" class="text-dark  text-decoration-none">Users</a></li>
                        <?php
                        } ?>
                        
                        <li class="list-group-item"><a href="" class="text-dark  text-decoration-none">Settings</a></li>
                        <li class="list-group-item"><a href="logout.php" class="text-dark  text-decoration-none"><?php echo $_SESSION['username'] ?>, Logout</a></li>
                        </ul>
                    </div>
                </div>