<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>
    <div class="col-xxl-9">
        <?php
            if(isset($_SESSION['category-add'])) {
                echo $_SESSION['category-add'];
                unset($_SESSION['category-add']);
            }

            if(isset($_SESSION['category-update'])) {
                echo $_SESSION['category-update'];
                unset($_SESSION['category-update']);
            }

            if(isset($_SESSION['category-delete'])) {
                echo $_SESSION['category-delete'];
                unset($_SESSION['category-delete']);
            }
        ?>
        <a href="add-category.php" class="btn btn-primary mb-3">Add New Category</a>
        <table class="table table-border">
            <tr>
                <th>SL No.</th>
                <th>Title</th>
                <th>Post Count</th>
                <th>Action</th>
            </tr>

            <?php
                $cat_sql = "SELECT * FROM category";
                $cat_query = mysqli_query($con, $cat_sql);
                $i = 1;
                while($row = mysqli_fetch_assoc($cat_query)) {
                    ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $row['cat_name'];?></td>
                        <td><?php echo $row['post_count'];?></td>
                        <td>
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-success" type="button"><a href="edit-category.php?id=<?php echo $row['cat_id'];?>" class="text-white text-decoration-none">Edit</a></button>
                                <button class="btn btn-danger" type="button"><a href="delete-category.php?id=<?php echo $row['cat_id'];?>" class="text-white text-decoration-none" onclick="return confirm('Are You Sure?')">Delete</a></button>
                            </div>
                        </td>
                    </tr>      
                    <?php
                }
            ?>      
        </table>
    </div>
<?php include 'inc/footer.php'; ?>