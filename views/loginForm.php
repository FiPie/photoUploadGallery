<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Description" content="Author: F.Piechowiak, Category: Web Aplication">
        <title>Login Page</title>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Bootstrap bundle -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body class="d-flex flex-column">
        <div class="page-content">
            <?php include "../fragments/menu.php"; ?>
            <div class="container">
                <div class="row mt-1 px-5 text-center" style="max-height: 30px">
                    <div id="message" class="col-sm-10 py-3 mb-5 mx-auto alert alert-<?= $_SESSION['msg_type'] ?>">
                        <?php
                        if (isset($_SESSION["promptMessage"])) {
                            echo $_SESSION["promptMessage"];
                            echo ("<button class='close' onclick='cleanMsg(`" . $_SESSION['msg_type'] . "`)'><span>&times;</span></button>");
                        }
                        unset($_SESSION["promptMessage"]);
                        unset($_SESSION["msg_type"]);
                        ?>
                    </div>
                </div>
                <!-- Insert/Drop Grid Row codes below -->

                <div class="row justify-content-center"> 
                    <form action="../controllers/loginHandler.php" method="POST" name="login">
                        <div class="form-group"> 
                            <label>User ID</label>
                            <input autofocus="true" class="form-control" type="text" name="userName" required="TRUE" placeholder="Enter User ID">
                        </div>
                        <div class="form-group"> 
                            <label>Password</label>
                            <input class="form-control" type="password" name="userPswd" required="TRUE" placeholder="Enter Password">
                        </div>
                        <div class="form-group"> 
                            <label>Login</label>
                            <input class="btn btn-primary form-control" type="submit" value="Login">
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <?php include "../fragments/footer.php"; ?>
        <script src="../js/loginForm.js"></script>
    </body>
</html>
