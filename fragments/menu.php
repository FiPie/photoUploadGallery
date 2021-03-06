<?php
$serverName = $_SERVER['SERVER_NAME'];                          // localhost
$uri = $_SERVER['REQUEST_URI'];                                 // /~userName/photoUploadGallery/index.php
$base = $serverName . $uri;                                     // localhost/~userName/photoUploadGallery/index.php
$uriCheck = explode("/", $uri);                                 // photoUploadGallery
$menuPathArray = explode("/", __FILE__);                        // home userNameFolder public_html photoUploadGallery fragments menu.php
$projectFolderName = $menuPathArray[count($menuPathArray) - 3]; // photoUploadGallery
$end = strrpos($base, "/" . $projectFolderName . "/");          // index ex. 19

if (($uriCheck[count($uriCheck) - 1] == "index.php" && $uriCheck[count($uriCheck) - 2] == "") || ($uriCheck[count($uriCheck) - 2] == "views" && $uriCheck[count($uriCheck) - 3] == "")) {
    $webRoot = "http://" . $serverName . "/";
    define('SITE_URL', $webRoot);
} else {
    $webRoot = "http://" . (substr($base, 0, $end + 1)) . $projectFolderName . "/";
    define('SITE_URL', $webRoot);
}

//echo "<b>serverName</b>: ".$serverName."<br>";
//echo "<b>uri</b>: ".$uri."<br>";
//echo "<b>uriCheck</b>: ".$uriCheck[count($uriCheck)-2]."<br>";
//echo "<b>uriCheck count</b>: ".count($uriCheck)."<br>";
//echo "<b>base</b>: ".$base."<br>";
//echo "<b>menuPathArray</b>: ".implode(" ", $menuPathArray)."<br>" ;
//echo "<b>projectFolderName</b>: ".$projectFolderName."<br>";
//echo "<b>end</b>: ".$end."<br>";
//echo "<b>webRoot</b>: ".$webRoot."<br>";
?>


<nav class="navbar navbar-expand-lg my-0 py-0 navbar-dark bg-dark">
    <div class="container my-0 py-0">
        <a class="navbar-brand" id="link1" href="<?= SITE_URL . 'index.php' ?>"><i class="fas fa-camera"></i> Photo Upload Gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        MENU
                    </a>
                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" id="link2" href="<?= SITE_URL . 'index.php' ?>">Homepage</a>

                        <?php
                        if ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == TRUE)) {
                            $logged = TRUE;
                        } elseif ((isset($_SESSION['logged']) == TRUE) && ($_SESSION['logged'] == FALSE)) {
                            $logged = FALSE;
                        } else {
                            $logged = FALSE;
                        }

                        if ($logged == FALSE) {
                            $login = SITE_URL . 'views/loginForm.php';
                            echo "<a class='dropdown-item' id='link6' href='$login'>Login</a>";
                        } else {
                            $logout = SITE_URL . 'controllers/logoutHandler.php';
                            echo "<a class='dropdown-item' id='link7' href='$logout'>Logout</a>";
                        }
                        ?>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="link3" href="<?= SITE_URL . 'views/thumbnailGallery.php' ?>">Gallery</a>
                        <a class="dropdown-item" id="link4" href="<?= SITE_URL . 'views/show.php' ?>">Slider</a>
                        <a class="dropdown-item" id="link5" href="<?= SITE_URL . 'views/legalNote.php' ?>">Legal Note</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
