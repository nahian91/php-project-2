<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>

<?php
    $id = $_GET['id'];

    $post_sql = "SELECT * FROM post
    LEFT JOIN users ON post.author = users.id
    LEFT JOIN category ON post.category = category.cat_id
    WHERE post_id = $id";
    $post_query = mysqli_query($con, $post_sql);
    $row = mysqli_fetch_assoc($post_query);
?>
<div class="col-xxl-9">
    <form method="POST" action="update-post.php" enctype="multipart/form-data">
        <input type="hidden" name="post_id" value="<?php echo $row['post_id'];?>">
        <div class="mb-3">
            <label class="form-label">Post Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Description</label>
            <textarea name="description" class="form-control"><?php echo $row['description'];?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Image</label>
            <input type="file" class="form-control" name="new_image">
            <img src="images/<?php echo $row['image'];?>" alt="<?php echo $row['title'];?>">
            <input type="hidden" name="old_image" value="<?php echo $row['image'];?>">
        </div>
        <div class="mb-3">
            
            <label class="form-label">Post Category</label>
            <select name="category" class="form-control">
                <option selected disabled>Select Category</option>
                <?php
                $cat_sql = "SELECT * FROM category";
                $cat_query = mysqli_query($con, $cat_sql);
                while($cat_row = mysqli_fetch_assoc($cat_query)) {

                    if($row['category'] == $cat_row['cat_id']) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    ?>  
                        <option value="<?php echo $cat_row['cat_id'];?>" <?php echo $selected;?>><?php echo $cat_row['cat_name'];?></option>
                    <?php
                }
            ?>
            </select>
            <input type="hidden" name="old_category" value="<?php echo $row['category'];?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update Post</button>
    </form>
    
</div>

<?php include 'inc/footer.php'; ?>