<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>

<?php
    if(isset($_POST['submit'])) {

        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];

        $file_exp = explode('.', $name);
        $file_lower = strtolower(end($file_exp));
        $file_exts = array('png', 'jpg');

        $rename = date('Y') . '-' . rand(9,999) . '.' .$file_lower;

        if(in_array($file_lower, $file_exts, $rename)) {
            if($size < 200000) {
                move_uploaded_file($tmp_name, 'images/' . $rename);
                
            } else {
                echo 'Image too big. less then 100kb';
            }
        } else {    
            echo 'Image must be png or jpg';
        }

        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $author = $_SESSION['id'];

        $sql = "INSERT INTO post (title, description, image, category, author) VALUE ('$title', '$description', '$rename', '$category', '$author');";
        
        $sql .= "UPDATE category SET post_count = post_count + 1 WHERE cat_id = '$category'";

        $join_sql = mysqli_multi_query($con, $sql);

        if($join_sql) {
            $_SESSION['post-add'] = 'Post Addedd Success';
            header('Location: posts.php');
        } else {
            echo 'Failed';
        }
    }
?>

<div class="col-xxl-9">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Post Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            
            <label class="form-label">Post Category</label>
            <select name="category" class="form-control">
                <option selected disabled>Select Category</option>
                <?php
                $cat_sql = "SELECT * FROM category";
                $cat_query = mysqli_query($con, $cat_sql);
                while($cat_row = mysqli_fetch_assoc($cat_query)) {
                    ?>  
                        <option value="<?php echo $cat_row['cat_id'];?>"><?php echo $cat_row['cat_name'];?></option>
                    <?php
                }
            ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Add Post</button>
    </form>
    
</div>

<?php include 'inc/footer.php'; ?>