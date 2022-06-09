<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>
    <div class="col-xxl-9">
        <a href="add-post.php" class="btn btn-primary mb-3">Add New Post</a>
        <table class="table table-border">
            <tr>
                <th>SL No.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
                <tr>
                    <td>1</td>
                    <td>Post Title</td>
                    <td><img src="images/blog2.jpg" alt="" style="width:100px"></td>
                    <td>Food</td>
                    <td>Admin</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-primary" type="button"><a href="view-post.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none">View</a></button>
                            <button class="btn btn-success" type="button"><a href="edit-post.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none">Edit</a></button>
                            
                            <?php if($_SESSION['role'] == 0) { ?>
                            <button class="btn btn-danger" type="button"><a href="delete-post.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none" onclick="return confirm('Are You Sure?')">Delete</a></button>
                            <?php } ?>
                        </div>
                    </td>
                </tr>            
        </table>
    </div>
<?php include 'inc/footer.php'; ?>