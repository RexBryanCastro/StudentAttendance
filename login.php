<?php
session_start();
include "./api/connection.php";
if (isset($_POST['btnSubmit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM tblusers WHERE user_name = :username AND user_pass = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<script> console.log('" . $rs  . "');</script>";
        if ($rs['status'] == 1) {
            // $user_id = $rs['user_id'];
            // $_SESSION['user_id'] = $user_id;
            // //userName
            // $user_name = $rs['user_name'];
            // $_SESSION['user_name'] = $user_name;
            echo "<script>alert('Invalid Name or Password!');</script>";
            header("Location: ./login.php");
        } else if ($rs['status'] == 2) {
            $user_id = $rs['user_id'];
            $_SESSION['user_id'] = $user_id;
            //userName
            $user_name = $rs['user_name'];
            $_SESSION['user_name'] = $user_name;
            header("Location: ./instrucIndex.php");
        } else if ($rs['status'] == 3) {
            $user_id = $rs['user_id'];
            $_SESSION['user_id'] = $user_id;
            //userName
            $user_name = $rs['user_name'];
            $_SESSION['user_name'] = $user_name;
            header("Location: ./adminindex.php");
        }
        //userID

    } else {
        echo "<script>alert('Invalid Name or Password!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>
<style>
    body {
        position: relative;
        background-image: url(./image/school_bg.jpg);
    }

    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, white, red);
        opacity: 0.7;
        /* Adjust the opacity to control the intensity of the gradient */
        z-index: -1;
    }
</style>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <center>
                        <img src="./image/school_logo.png" alt="Logo 1" class="logo" style="width: 200px; height: auto;">
                        <!-- Add the second logo -->
                        <img src="./image/dep_logo.png" alt="Logo 2" class="logo" style="width: 200px; height: auto;">
                    </center>
                    <div class="row justify-content-center">

                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form method="post">
                                        <!-- Form Group (username address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input name="username" class="form-control" id="inputEmailAddress" type="text" placeholder="Enter email address" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Enter password" />
                                        </div>
                                        <!-- Form Group (remember password checkbox)-->
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                                <label class="form-check-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="auth-password-basic.html">Forgot Password?</a>
                                            <input type="submit" class="btn btn-primary btn-user btn-block" id="btnSubmit" name="btnSubmit" value="Login">
                                            <!-- <a class="btn btn-primary" href="dashboard-1.html">Login</a> -->
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <!-- <div class="col-md-6 small">Copyright © Your Website 2023</div> -->
                        <!-- <div class="col-md-6 text-md-end small">
                            <a href="auth-login-basic.html#!">Privacy Policy</a>
                            ·
                            <a href="auth-login-basic.html#!">Terms &amp; Conditions</a>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
    <!-- <sb-customizer project="sb-admin-pro"></sb-customizer>  -->

    <script>
        (function() {
            var js = "window['__CF$cv$params']={r:'750b4b9be844073a',m:'XcCNQtsiZ9zaIrbjrXKlSZctCyFxb8XKDv1jRtqcUv0-1664187923-0-AcykVJiJu2/9wQizgMjlFBQpyyx7oLmrTCq0mawLM6zi0e5BPvPGQuOzNulAUUcTPxnjIhkm9El+jrCiKScFa5YwwCH0rcUQ8XTtvP+QLttfiOWebdvTYUHEuiYi5r1QK6SYCnkmnT+9xPJDv1mzaLc=',s:[0xbed09f9b75,0x4395878988],u:'/cdn-cgi/challenge-platform/h/g'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='/cdn-cgi/challenge-platform/h/g/scripts/alpha/invisible.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";
            var _0xh = document.createElement('iframe');
            _0xh.height = 1;
            _0xh.width = 1;
            _0xh.style.position = 'absolute';
            _0xh.style.top = 0;
            _0xh.style.left = 0;
            _0xh.style.border = 'none';
            _0xh.style.visibility = 'hidden';
            document.body.appendChild(_0xh);

            function handler() {
                var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
                if (_0xi) {
                    var _0xj = _0xi.createElement('script');
                    _0xj.nonce = '';
                    _0xj.innerHTML = js;
                    _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
                }
            }
            if (document.readyState !== 'loading') {
                handler();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', handler);
            } else {
                var prev = document.onreadystatechange || function() {};
                document.onreadystatechange = function(e) {
                    prev(e);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = prev;
                        handler();
                    }
                };
            }
        })();
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"750b4b9be844073a","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2022.8.1","si":100}' crossorigin="anonymous"></script>
</body>

</html>