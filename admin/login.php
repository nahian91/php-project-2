<?php
    session_start();
    include 'inc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 text-center">
                    <div class="admin-title bg-secondary p-3 text-white">
                        <h2>Admin Panel</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xxl-6 mx-auto">
                    <form method="POST" action="#">
                        <div class="mb-3">
                            <labelclass="form-label">Email address</labelclass=>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="login">Login</button>
                    </form>

                    <?php
                        if(isset($_POST['login'])) {
                            $email = $_POST['email'];
                            $password = md5($_POST['password']);

                            $sql = "SELECT id, username, email, password, role FROM users WHERE email = '$email' AND password = '$password'";
                            $result = mysqli_query($con, $sql);

                            $count = mysqli_num_rows($result);
                            if($count > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    $_SESSION['id'] = $row['id'];
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['email'] = $row['email'];
                                    $_SESSION['password'] = $row['password'];
                                    $_SESSION['role'] = $row['role'];
                                    header('Location: index.php');
                                } 
                            } else {
                                echo 'Username or Password Not Match!';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php include 'inc/footer.php';?>