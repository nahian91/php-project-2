<?php 

include 'inc/config.php';
include 'inc/header.php';

    $id = $_GET['id'];
    $post_sql = "SELECT * FROM post
    LEFT JOIN users ON post.author = users.id
    LEFT JOIN category ON post.category = category.cat_id
    WHERE post_id = $id";
    $post_query = mysqli_query($con, $post_sql);
    $result = mysqli_fetch_assoc($post_query);
    $sqldate = strtotime($result['date']);
    $date = date('d M, Y', $sqldate);
?>
    <section class="breadcumb-area" style="background-image: url('assets/img/bread.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcumb">
                        <h1><?php echo $result['title'];?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="post-area pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9">
                    <div class="single-post">
                        <img src="admin/images/<?php echo $result['image'];?>" alt="<?php echo $result['title'];?>">
                        <div class="meta">
                            <a href="user.php?id=<?php echo $result['id'];?>"><?php echo $result['fullname'];?></a> | 
                            <a href="category.php?id=<?php echo $result['cat_id'];?>"><?php echo $result['cat_name'];?></a> |
                            <a href=""><?php echo $date;?></a>
                        </div>
                        <h4><a href=""><?php echo $result['title'];?></a></h4>
                        <p><?php echo $result['description'];?></p>
                    </div>
                </div>
                <div class="col-xxl-3">
                    <?php include 'inc/sidebar.php';?>
                </div>
            </div>
        </div>
    </section>

    <?php include 'inc/footer.php';?>