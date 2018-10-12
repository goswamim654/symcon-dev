<?php
include 'lang/GermanWords.php';
include 'config/route.php';
if(isset($_SESSION['access_token'])) {
    header('Location: '.$absoluteUrl);
}
include 'api/login.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Symcom | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $absoluteUrl;?>plugins/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $absoluteUrl;?>assets/css/AdminLTE.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo $absoluteUrl;?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo $absoluteUrl;?>assets/css/login.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
    <div class="sc-igwadP kESmeQ">
        <div class="sc-ckYZGd UpIaV sc-caSCKo jMJptc">
            <img class="sc-cnTzU hihcIW sc-eweMDZ fBsUCS" src="<?php echo $absoluteUrl;?>assets/img/leaves-top.svg">
            <img class="sc-dXLFzO dVQlII sc-eweMDZ fBsUCS" src="<?php echo $absoluteUrl;?>assets/img/leaves-bottom.svg">
            <div class="sc-eQGPmX eCgWac logo-div">
                <img alt="Acorns" src="<?php echo $absoluteUrl;?>assets/img/logo-big.png">
            </div>
            <form class="sc-kVfTjK llGERO" id="loginForm" autocomplete="off" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="sc-gjAXCV irlZp">
                    <label class="sc-dOkuiw iMAhFM">Username</label><span class="error-text"></span>
                    <input class="sc-hMjcWo dxJQAa" name="username" placeholder="Username" type="text" value="" autofocus>
                </div>
                <div class="sc-bQQHgq elQaKU">
                    <div class="sc-gjAXCV irlZp">
                        <label class="sc-dOkuiw iMAhFM">Password</label><span class="error-text"></span>
                        <input class="sc-hMjcWo dxJQAa" name="password" placeholder="●●●●●●●●" type="password" value="">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="checkbox icheck">
                                    <label>
                                      <input type="checkbox"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="sc-eAudoH fbHQWt col-xs-6"><a href="#">Forgot password?</a></div>
                        </div>
                    </div>
                </div>
                <button class="sc-frpTsy iQoeKm sc-dxgOiQ crAxhg">Log In</button>
            </form>
            <div class="sc-cFMgCN cndWlt">
                <a href="#" class="sc-jbxdUx jWPjDn">Don't Have An Account?</a>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?php echo $absoluteUrl;?>plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo $absoluteUrl;?>plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jquery validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var loginForm = $("#loginForm").validate({
                errorPlacement: function(error, element) {
                    error.appendTo(element.prev("span"));
                },
                rules: {
                    'username': "required",
                    'password': "required"
                },
                messages: {
                    'username': "username ist eine Pflichtangabe",
                    'password': "password ist eine Pflichtangabe"
                }
            });
        });
    </script>
</body>
</html>
