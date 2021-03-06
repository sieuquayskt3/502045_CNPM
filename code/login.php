<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php

    $error = '';

    if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
        $user = $_COOKIE['user'];
        $pass = $_COOKIE['pass'];
    }
    else {
        $user = '';
        $pass = '';
    }
    

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Vui lòng nhập tài khoản';
        }
        else if (empty($pass)) {
            $error = 'Vui lòng nhập mật khẩu';
        }
        else if (strlen($pass) < 6) {
            $error = 'Mật khẩu cần ít nhất 6 ký tự';
        }  else {
            // chỉ lưu cookie khi user click remember
            if (isset($_POST['remember'])) {
                // set coookie for 1 day
                setcookie('user',$user, time() + 3600 * 24);
                setcookie('pass',$pass, time() + 3600 * 24);
            }
            
            //-----------Đăng nhập
            
            // $_SESSION['user'] = $user;
            header('Location: home.php');
        } 
        
    }
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 class="text-center text-secondary mt-5 mb-3">Đăng nhập</h3>
            <form method="post" action="" class="border rounded w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Tên tài khoản</label>
                    <input value="<?= $user ?>" name="user" id="user" type="text" class="form-control" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input name="pass" value="<?= $pass ?>" id="password" type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input <?= isset($_POST['remember']) ? 'checked' : '' ?> name="remember" type="checkbox" class="custom-control-input" id="remember">
                    <label class="custom-control-label" for="remember">Nhớ mật khẩu</label>
                </div>
                <div class="form-group text-center">
                    <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger'>$error</div>";
                        }
                    ?>
                    <button class="btn btn-success px-5 ">Đăng nhập</button>
                </div>
                <div class="form-group">
                    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a>.</p>
                    <!-- <p>Quên mật khẩu? <a href="resetPassword.php">Khôi phục mật khẩu</a>.</p> -->
                </div>
            </form>
            
        </div>
    </div>
</div>

</body>
</html>
