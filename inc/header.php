<?php
    include 'inc/config.php';
    $title = basename($_SERVER['PHP_SELF']);

    switch($title) {
        case 'user.php':
            $user_id = $_GET['id'];
            if(isset($user_id)) {
                $user_sql = "SELECT * FROM users WHERE id = $user_id";
                $user_query = mysqli_query($con, $user_sql);
                $user_result = mysqli_fetch_assoc($user_query);
                $page_title = $user_result['fullname'];
            }
        break;
        case 'category.php':
            $cat_id = $_GET['id'];
            if(isset($cat_id)) {
                $cat_sql = "SELECT * FROM category WHERE cat_id = $cat_id";
                $cat_query = mysqli_query($con, $cat_sql);
                $cat_result = mysqli_fetch_assoc($cat_query);
                $page_title = $cat_result['cat_name'];
            }
        break;
        case 'single-post.php':
            $single_id = $_GET['id'];
            if(isset($single_id)) {
                $post_sql = "SELECT * FROM post WHERE post_id = $single_id";
                $post_query = mysqli_query($con, $post_sql);
                $post_result = mysqli_fetch_assoc($post_query);
                $page_title = $post_result['title'];
            }
        break;
        case 'search.php':
            $search = $_GET['search'];
            if(isset($search)) {
                $search_sql = "SELECT * FROM post WHERE title LIKE '%$search%'";
                $search_query = mysqli_query($con, $search_sql);
                $search_result = mysqli_fetch_assoc($search_query);
                $page_title =  $search;
            }
        break;
        case 'index.php':
            $page_title = 'Home';
        break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title;?> | Blog Website</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3">
                    <div class="logo">
                        <a href="">Blog</a>
                    </div>
                </div>
                <div class="col-xxl-9">
                    <div class="menu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="#">Category</a>
                                <ul>
                                    <?php
                                        $cat_sql = "SELECT * FROM category ORDER BY cat_name";
                                        $cat_query = mysqli_query($con, $cat_sql);
                                        while($result = mysqli_fetch_assoc($cat_query)){
                                            ?>
                                                <li><a href="category.php?id=<?php echo $result['cat_id'];?>"><?php echo $result['cat_name'];?> - <?php echo $result['post_count'];?></a></li>
                                            <?php
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="#">Users</a>
                                <ul>
                                <?php
                                    $user_sql = "SELECT * FROM users ORDER BY fullname";
                                    $user_query = mysqli_query($con, $user_sql);
                                    while($result = mysqli_fetch_assoc($user_query)){
                                        ?>
                                            <li><a href="user.php?id=<?php echo $result['id'];?>"><?php echo $result['fullname'];?></a></li>
                                        <?php
                                    }
                                ?>
                                </ul>
                            </li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    