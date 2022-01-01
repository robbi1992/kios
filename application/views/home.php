<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="ECD Online" />
        <meta name="author" content="Kantor Bea Cukai" />
        <title>ECD - Online</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/assets/img/bc_logo.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/app/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <!-- load image here -->
        <img class="d-none" src="/assets/img/g20_page.jpg" />
        <div class="my-container">
            <div class="container-fluid">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-white <?= ($home['active'] == 1) ? 'active' : '';?>" href="/?lang=en">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white <?= ($home['active'] == 0) ? 'active' : '';?>" href="/">Indonesia</a>
                    </li>
                </ul>
                
                <div class="home-title mt-5">
                    <img class="bc-logo" src="/assets/img/bc_logo.png" /> <br />
                    <b>E CUSTOMS</b>
                </div>
                <div class="sub-title">DECLARATION</div>
            </div>

            <!-- space -->
            <div class="mt-5">&nbsp;</div>
            <div class="mt-5">
                &nbsp;
            </div>
            <div class="mt-5">
                &nbsp;
            </div>
            <div class="mt-4">
                <div class="p-3 text-center">
                    <a style="padding-left: 20px; padding-right: 20px;" href="/passengers<?= isset($_GET['lang']) ? '?lang=' . $_GET['lang'] : '';?>" class="btn btn-primary"><?= $home['button'];?></a>
                </div>
            </div>
            <div class="mt-0 text-white p-3 bc-desc">
                <h4><?=$home['header'];?></h4>
                <?= $home['text']; ?>
            </div>
            <!-- 
            <div class="mt-0 p-3 text-center">
                <a href="/passengers<?= isset($_GET['lang']) ? '?lang=' . $_GET['lang'] : '';?>" class="btn btn-primary"><?= $home['button'];?></a>
            </div>
            -->
            <!-- end containter-fluid -->
        </div>
        <!-- end my-container -->
        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>