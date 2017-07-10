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
    <link rel="stylesheet" href="http://localhost/Footballcity_Project/css/bootstrap.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="http://localhost/Footballcity_Project/css/site.css">

    <!--JS-->
    <!-- jQuery Version 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Tether -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse" role="navigation">

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="container">

        <div class="navbar-brand">
            <img src="images/logo/logo.png">
        </div>

        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Footballcity_Project/football_boots">Обувь</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Footballcity_Project/balls">Мячи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Форма</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Тренировочная одежда</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Вратарская экипировка</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="location">Наш адрес</a>
                </li>
            </ul>
        </div>
    </div>

</nav>

    <!-- Page Content -->
    <div id="content" class="container">
        <?php include 'application/views/'.$contentView; ?>
    </div>
    <!-- /.container -->

<!-- Footer -->
<footer id="footer" class="py-4 bg-inverse popover-bottom fixed-bottom">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
</footer>

</body>

</html>