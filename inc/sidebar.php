<?php include 'inc/config.php';?>

<div class="sidebar">
    <div class="single-sidebar">
        <h4>Search</h4>
        <form action="search.php" method="GET">
            <input type="search" class="form-control" name="search" placeholder="Type Here...">
            <input type="submit" class="form-control" value="Search">
        </form>
    </div>
    <div class="single-sidebar">
        <h4>Category</h4>        
        <ul class="list-group">
            <?php
                $cat_sql = "SELECT * FROM category ORDER BY cat_name";
                $cat_query = mysqli_query($con, $cat_sql);
                while($result = mysqli_fetch_assoc($cat_query)){
                    ?>
                        <li class="list-group-item"><a href="category.php?id=<?php echo $result['cat_id'];?>"><?php echo $result['cat_name'];?> - <?php echo $result['post_count'];?></a></li>
                    <?php
                }
            ?>
        </ul>
    </div>
    <div class="single-sidebar">
        <h4>Recent Posts</h4>
        <ul class="list-group">
            <?php
                $post_sql = "SELECT * FROM post ORDER BY title";
                $post_query = mysqli_query($con, $post_sql);
                while($result = mysqli_fetch_assoc($post_query)){
                    ?>
                        <li class="list-group-item"><a href="single-post.php?id=<?php echo $result['post_id'];?>"><?php echo $result['title'];?></a></li>
                    <?php
                }
            ?>
        </ul>
    </div>

    <div class="single-sidebar">
        <h4>Users</h4>
        <ul class="list-group">
            <?php
                $user_sql = "SELECT * FROM users ORDER BY fullname";
                $user_query = mysqli_query($con, $user_sql);
                while($result = mysqli_fetch_assoc($user_query)){
                    ?>
                        <li class="list-group-item"><a href="user.php?id=<?php echo $result['id'];?>"><?php echo $result['fullname'];?></a></li>
                    <?php
                }
            ?>
        </ul>
    </div>
</div>