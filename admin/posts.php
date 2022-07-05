<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>
    <div class="col-xxl-9">
        <?php
            if(isset($_SESSION['post-add'])) {
                echo $_SESSION['post-add'];
                unset($_SESSION['post-add']);
            }

            if(isset($_SESSION['post-delete'])) {
                echo $_SESSION['post-delete'];
                unset($_SESSION['post-delete']);
            }
        ?>
        <a href="add-post.php" class="btn btn-primary mb-3">Add New Post</a>
        <table class="table table-border">
            <tr>
                <th>SL No.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            <?php
                $post_sql = "SELECT * FROM post
                LEFT JOIN users ON post.author = users.id
                LEFT JOIN category ON post.category = category.cat_id
                ORDER BY post.post_id DESC";
                $post_query = mysqli_query($con, $post_sql);
                $i = 0;
                while($row = mysqli_fetch_assoc($post_query)) {
                    $i++;
                    $sqldate = strtotime($row['date']);
                    $date = date('d M, Y', $sqldate);
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['title'];?></td>
                            <td><img src="images/<?php echo $row['image'];?>" alt="" style="width:100px"></td>
                            <td><?php echo $row['cat_name'];?></td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    <button class="btn btn-primary" type="button"><a href="view-post.php?id=<?php echo $row['post_id'];?>" class="text-white text-decoration-none">View</a></button>
                                    <button class="btn btn-success" type="button"><a href="edit-post.php?id=<?php echo $row['post_id'];?>" class="text-white text-decoration-none">Edit</a></button>
                                    
                                    <?php if($_SESSION['role'] == 0) { ?>
                                    <button class="btn btn-danger" type="button"><a href="delete-post.php?id=<?php echo $row['post_id'];?>&cat_id=<?php echo $row['category']; ?>" class="text-white text-decoration-none" onclick="return confirm('Are You Sure?')">Delete</a></button>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>    
                    <?php
                }
            ?>        
        </table>
    </div>
<?php include 'inc/footer.php'; ?>