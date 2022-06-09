<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>
    <div class="col-xxl-9">
        <a href="add-category.php" class="btn btn-primary mb-3">Add New Category</a>
        <table class="table table-border">
            <tr>
                <th>SL No.</th>
                <th>Title</th>
                <th>Post Count</th>
                <th>Action</th>
            </tr>
                <tr>
                    <td>1</td>
                    <td>Food</td>
                    <td>3</td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-success" type="button"><a href="edit-post.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none">Edit</a></button>
                            <button class="btn btn-danger" type="button"><a href="delete-post.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none" onclick="return confirm('Are You Sure?')">Delete</a></button>
                        </div>
                    </td>
                </tr>            
        </table>
    </div>
<?php include 'inc/footer.php'; ?>