<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>

<?php
    if(isset($_POST['submit'])) {
        $cat = $_POST['category'];

        $cat_check = "SELECT cat_name FROM category WHERE cat_name = '$cat'";
        $cat_check_query = mysqli_query($con, $cat_check);
        $cat_check_row = mysqli_num_rows($cat_check_query);
        if($cat_check_row > 0) {
            $error = "Category Already Exists!";
        } else {
            $cat_insert = "INSERT INTO category (cat_name) VALUES ('$cat')";
            $cat_insert_query = mysqli_query($con, $cat_insert);
            if($cat_insert) {
                $_SESSION['category-add'] = '<div class="alert alert-success">Category Added Successfully!</div>';
                header('Location: categorys.php');
            }
        }
    }
?>

<div class="col-xxl-9">
    <?php if(isset($error)) {echo $error;} ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" name="category">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
    </form>
    
</div>

<?php include 'inc/footer.php'; ?>