
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $error = '';
    $name = '';
    $email = '';
    $user = '';
    $pass = '';
    $pass_confirm = '';
    $phone = '';
    
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])
    && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['pass-confirm']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pass_confirm = $_POST['pass-confirm'];
        $phone = $_POST['phone'];

        if (empty($name)) {
            $error = 'Vui lòng nhập họ và tên';
            
        }
        else if (empty($email)) {
            $error = 'Vui lòng nhập email';
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            $error = 'Email không hợp lệ';
        }
        else if (empty($user)) {
            $error = 'Vui lòng nhập tên đăng nhập';
        }
        else if (empty($pass)) {
            $error = 'Vui lòng nhập mật khẩu';
        }
        else if (strlen($pass) < 6) {
            $error = 'Mật khẩu ít nhất 6 ký tự';
        }
        else if ($pass != $pass_confirm) {
            $error = 'Mật khẩu không khớp';
        }
        else if (empty($phone)) {
            $error = 'Vui lòng nhập số điện thoại';
        }
        else {
            //-------------------------------- register a new account
            
            header('Location: login.php');
        
        }
    }
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 border my-5 p-4 rounded mx-3">
                <h3 class="text-center text-secondary mt-2 mb-3 mb-3">Đăng ký tài khoản</h3>
                <form method="post" action="" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Họ và tên</label>
                            <input value="<?= $name?>" name="name" class="form-control" type="text" id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Số điện thoại</label>
                            <input value="<?= $phone?>" name="phone" class="form-control" type="text" id="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?= $email?>" name="email" class="form-control" type="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="user">Tên đăng nhập</label>
                        <input value="<?= $user?>" name="user" class="form-control" type="text" id="user">
                        <div class="invalid-feedback">Vui lòng nhập tài khoản</div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Mật khẩu</label>
                        <input  value="<?= $pass?>" name="pass" class="form-control" type="password" id="pass">
                        <div class="invalid-feedback">Mật khẩu không hợp lệ.</div>
                    </div>
                    <div class="form-group">
                        <label for="pass2">Xác nhận mật khẩu</label>
                        <input value="<?= $pass_confirm?>" name="pass-confirm" required class="form-control" type="password" id="pass2">
                        <div class="invalid-feedback">Mật khẩu không trùng khớp.</div>
                    </div>

                    <div class="form-group text-center">
                        <?php
                            if (!empty($error)) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        ?>
                        <button type="submit" class="btn btn-success px-5 mt-3 ml-3">Đăng ký</button>
                    </div>
                    <div class="form-group">
                        <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>
</html>

