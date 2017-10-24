<?php
$siteData = simplexml_load_file('xml/siteData.xml');
$rootDirectory = $siteData->rootDirectory;
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="favicon.png">
    <title>Location</title>

    <!--CSS-->
    <!-- Bootstrap Core CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.css">-->
    <link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/site.css">
    <link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/carousel.css">

    <!--JS-->
    <!-- jQuery Version 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Tether -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="<?php echo $rootDirectory;?>/js/site.js"></script>
    <script src="<?php echo $rootDirectory;?>/js/header.js"></script>
    <script src="<?php echo $rootDirectory;?>/js/carousel.js"></script>
    <script src="<?php echo $rootDirectory;?>/js/basket.js"></script>

</head>

<body class="font-color">

    <?php require_once 'application/views/SHeaderView.php'; ?>

    <?php require_once 'application/views/SMenuView.php'; ?>

    <!-- Page Content -->
    <div id="content" class="container">
        <?php include 'application/views/'.$contentView; ?>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php include 'application/views/SFooterView.php'; ?>
</body>

</html>