<?php
$serverName = $_SERVER['SERVER_NAME'];
$uri = $_SERVER['REQUEST_URI'];
$base = $serverName . $uri;
$webRoot = substr($base, 0, 39);
define(SITE_URL, $webRoot);
// Here I am displaying all the variables obtained step by step. So far so good.               
echo '$serverName = <b>' . $serverName . '</b><br>';    //output:  localhost
echo '$uri = <b>' . $uri . '</b><br>';                  //output:  /~filippie/photoUploadGallery/index.php
echo '$base = <b>' . $base . '</b><br>';                //output:  localhost/~filippie/photoUploadGallery/index.php
echo '$webRoot = <b>' . $webRoot . '</b><br>';          //output:  localhost/~filippie/photoUploadGallery/
echo 'SITE_URL = <b>' . SITE_URL . '</b><br>';          //output:  localhost/~filippie/photoUploadGallery/

// But when I'm using above variable ex. SITE_URL in the code below, where I want to dynamically substitue the href value, somehow I recieve a string with the proper value but doubled and concatenated... moreover when I inspect the element with the href value I've created, the value displayed on element seems to be ok ex. 'localhost/~filippie/photoUploadGallery/index.php' but when I hover mouse over it, it shows the doubled string value ex. 'localhost/~filippie/photoUploadGallery/localhost/~filippie/photoUploadGallery/index.php'   why php!? WHY?!
?>

<nav class="navbar navbar-expand-lg my-0 py-0 navbar-dark bg-dark">
    <div class="container my-0 py-0">
        <a class="navbar-brand" href="<?= SITE_URL.'index.php' ?>"><i class="fas fa-camera"></i> Photo Upload Gallery</a>
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
                        <a class="dropdown-item" href="<?= SITE_URL . 'index.php' ?>">Homepage</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= SITE_URL . 'views/thumbnailGallery.php' ?>">Gallery</a>
                        <a class="dropdown-item" href="<?= SITE_URL . 'views/show.php' ?>">Slider</a>
                        <a class="dropdown-item" href="<?= SITE_URL . 'views/legalNote.php' ?>">Legal Note</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</nav>
