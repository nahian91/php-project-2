<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>


<?php
        if(isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $role = $_POST['role'];

            $user_check = "SELECT username, email FROM users WHERE username = '$username' OR email = '$email'";
            $user_query = mysqli_query($con, $user_check);
            $user_count = mysqli_num_rows($user_query);
            
            if($user_count > 0) {
                $error = 'Username or Email already exists';
            } else {
                $user_insert = "INSERT INTO users (fullname, username, email, password, role) VALUES ('$fullname', '$username', '$email', '$password', '$role')";
                $user_result = mysqli_query($con, $user_insert);
                if($user_result) {
                    header('Location: index.php');
                }
            }

            
        }
    ?>

<div class="col-xxl-9">
    <?php if(isset($error)) {echo $error;} ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname">
        </div>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Role</label>
            <select class="form-control" name="role">
                <option value="0">Admin</option>
                <option value="1">Moderator</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Add User</button>
    </form>
    
</div>

<?php include 'inc/footer.php'; ?>