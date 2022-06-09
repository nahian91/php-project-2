<?php 

include 'inc/config.php';
include 'inc/header.php'; 

if($_SESSION['role'] == 1 ) {
    header('Location: index.php');
}

?>
    <div class="col-xxl-9">
        <a href="add-user.php" class="btn btn-primary mb-3">Add New User</a>
        <?php
            if(isset($_SESSION['user-update'])) {
                echo $_SESSION['user-update'];
                unset($_SESSION['user-update']);
            }

            if(isset($_SESSION['user-delete'])) {
                echo $_SESSION['user-delete'];
                unset($_SESSION['user-delete']);
            }
        ?>
        <table class="table table-border">
            <tr>
                <th>SL No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php
                $users = "SELECT * FROM users";
                $result = mysqli_query($con, $users);
                $i = 0;
                while($row = mysqli_fetch_assoc($result)) {
                    $i++
            ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['fullname'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php if($row['role'] == 0) {echo 'Admin';} else {echo 'Moderator';}?></td>
                    <td>
                        <div class="d-grid gap-2 d-md-block">
                            <button class="btn btn-success" type="button"><a href="edit-user.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none">Edit</a></button>
                            <button class="btn btn-danger" type="button"><a href="delete-user.php?id=<?php echo $row['id'];?>" class="text-white text-decoration-none" onclick="return confirm('Are You Sure?')">Delete</a></button>
                        </div>
                    </td>
                </tr>
            <?php
                }
            ?>
            
        </table>
    </div>
<?php include 'inc/footer.php'; ?>