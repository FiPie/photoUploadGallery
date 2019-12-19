<?php
$serverName = $_SERVER['SERVER_NAME'];
$uri = $_SERVER['REQUEST_URI'];
$base = $serverName . $uri;
$end = strpos($base, "photoUploadGallery");
$webRoot = "http://".(substr($base, 0, $end)) . "photoUploadGallery/";
define('SITE_URL', $webRoot);
?>


<nav class="navbar navbar-expand-lg my-0 py-0 navbar-dark bg-dark">
    <div class="container my-0 py-0">
        <a class="navbar-brand" id="link1" href="<?= SITE_URL.'index.php' ?>"><i class="fas fa-camera"></i> Photo Upload Gallery</a>
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
                        <a class="dropdown-item" id="link2" href="<?= SITE_URL.'index.php' ?>">Homepage</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="link3" href="<?= SITE_URL.'views/thumbnailGallery.php' ?>">Gallery</a>
                        <a class="dropdown-item" id="link4" href="<?= SITE_URL.'views/show.php' ?>">Slider</a>
                        <a class="dropdown-item" id="link5" href="<?= SITE_URL.'views/legalNote.php' ?>">Legal Note</a>
                    </div>
                </li>
            </ul>
        </div>
        
    </div>
</nav>
