<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>

<?php
    $id = $_GET['id'];
    $user_info = "SELECT * FROM users WHERE id  = $id";
    $query = mysqli_query($con, $user_info);
    $row = mysqli_fetch_assoc($query);
?>

<div class="col-xxl-9">
    <form method="POST" action="#">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo $row['password'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role" value="<?php echo $row['role'];?>">
                <option value="0" <?php if($row['role'] == 0) {echo 'selected="selected"';} ?>>Admin</option>
                <option value="0" <?php if($row['role'] == 1) {echo 'selected="selected"';} ?>>Moderator</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update User</button>
    </form>
    <?php
        if(isset($_POST['submit'])) {
            $update_id = $row['id'];
            $fullname = $_POST['fullname'];
            $password = md5($_POST['password']);
            $role = $_POST['role'];

            $update_user = "UPDATE users SET fullname = '$fullname', password = '$password', role = $role WHERE id = $update_id";
            $update_result = mysqli_query($con, $update_user);
            if($update_user) {
                $_SESSION['use-update'] = '<div class="alert alert-success">User Updated Successfully!</div>';
                header('Location:index.php');
            }
        }
    ?>
</div>

<?php include 'inc/footer.php'; ?>