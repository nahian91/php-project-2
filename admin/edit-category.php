<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>

<?php
    $id =$_GET['id'];
    $old_cat = "SELECT * FROM category WHERE cat_id = '$id'";
    $old_cat_query = mysqli_query($con, $old_cat);
    $old_cat_row = mysqli_fetch_assoc($old_cat_query);
?>

<?php
        if(isset($_POST['submit'])) {
            $update_cat_id = $old_cat_row['cat_id'];
            $update_cat_name = $_POST['category'];

            $update_cat_check = "SELECT cat_name FROM category WHERE cat_name = '$update_cat_name'";
            $update_cat_query = mysqli_query($con, $update_cat_check);
            $count  = mysqli_num_rows($update_cat_query);

            if($count > 0) {
                $error = "Category Already Exists!";
            } else {
                $cat_update = "UPDATE category SET cat_name = '$update_cat_name' WHERE cat_id = '$update_cat_id'";
                $cat_update_query = mysqli_query($con, $cat_update);

                if($cat_update_query) {
                    $_SESSION['category-update'] = '<div class="alert alert-success">Category Updated Successfully!</div>';
                    header('Location: categorys.php');
                }
            }
        }
    ?>

<div class="col-xxl-9">
    <?php if(isset($error)) {echo $error;} ?>
    <form method="POST" action="#">
        <div class="mb-3">
            <label class="form-label">Update Category</label>
            <input type="text" class="form-control" name="category" value="<?php echo $old_cat_row['cat_name'];?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
    </form>
    
</div>

<?php include 'inc/footer.php'; ?>