<!DOCTYPE html>
<html>

<head>
    <title>Hash Slinger</title>
    <?php
    require_once(dirname(__FILE__).'/../scripts/importBootstrap.php');
    ?>
</head>

<body id="home-background">
    <?php require_once(dirname(__FILE__).'/../scripts/views/navBarView.php'); ?>
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-offset-2 col-md-8">
            <?php require_once(dirname(__FILE__).'/../scripts/views/homeView.php'); ?>
        </div>
    </div>

</body>

</html>