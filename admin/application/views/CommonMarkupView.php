<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Custom CSS -->
    <!--<link rel="stylesheet" type="text/css" href="../css/sb-admin.css">-->
    <link rel="stylesheet" type="text/css" href="http://localhost/Footballcity_Project/css/sb-admin.css">
    <!--<link rel="stylesheet" type="text/css" href="../css/dashboard.css">-->
    <link rel="stylesheet" type="text/css" href="http://localhost/Footballcity_Project/css/dashboard.css">

    <!-- Morris Charts CSS -->
    <!--<link href="css/plugins/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <!--<link rel="stylesheet" type="text/css" href="http://localhost/Footballcity_Project/font-awesome/css/font-awesome.min.css">-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!--My scripts-->
    <!--<script src="js/leftMenu.js"></script>-->
    <script src="http://localhost/Footballcity_Project/js/leftMenu.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/Footballcity_Project/admin">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!--<li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Обувь</a>
                    </li>-->
                    <li>
                        <a href="http://localhost/Footballcity_Project/admin/wares"">
                            <i class="fa fa-fw fa-arrows-v"></i>Все товары<i class="fa fa-fw fa-caret-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                            <i class="fa fa-fw fa-arrows-v"></i>Обувь<i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <!--<ul id="demo" class="expand">-->
                        <ul id="demo" class="collapse">
                            <li id="li_football_boots">
                                <!--<a id="football_boots" class="sub-menu-item active" href="http://localhost/Footballcity_Project/admin/boots">Футбольные бутсы</a>-->
                                <a id="football_boots" class="sub-menu-item" href="http://localhost/Footballcity_Project/admin/boots">Футбольные бутсы</a>
                            </li>
                            <li>
                                <a id="indoor_boots" class="sub-menu-item" href="http://localhost/Footballcity_Project/admin/indoor_boots">Обувь для зала</a>
                            </li>
                            <li>
                                <a id="outdoor_boots" class="sub-menu-item" href="http://localhost/Footballcity_Project/admin/outdoor_boots">Шиповки</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2">
                            <i class="fa fa-fw fa-arrows-v"></i> Мячи <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a id="football_balls" class="sub-menu-item" href="http://localhost/Footballcity_Project/admin/wares/football_balls">Мячи для футбола</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="http://localhost/Footballcity_Project/admin/wares/indoor_balls">Мячи для зала</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3">
                            <i class="fa fa-fw fa-arrows-v"></i> Форма <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a class="sub-menu-item" href="#">Майки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Шорты</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Гетры</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Комплекты</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4">
                            <i class="fa fa-fw fa-arrows-v"></i> Тренировочная одежда <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a class="sub-menu-item" href="#">Майки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Шорты</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Термобелье</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Куртки и ветровки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Носки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Шарфы и шапки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Перчатки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Спортивные костюмы</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-fw fa-arrows-v"></i> Сумки и рюкзаки <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5">
                            <i class="fa fa-fw fa-arrows-v"></i> Вратарская экипировка <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo5" class="collapse">
                            <li>
                                <a class="sub-menu-item" href="#">Перчатки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Свитера</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Майки</a>
                            </li>
                            <li>
                                <a class="sub-menu-item" href="#">Брюки и шорты</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo6">
                            <i class="fa fa-fw fa-arrows-v"></i> Защита <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo6" class="collapse">
                            <li>
                                <a class="sub-menu-item" href="#">Щитки</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo7">
                            <i class="fa fa-fw fa-arrows-v"></i> Прочее <i class="fa fa-fw fa-caret-down"></i>
                        </a>
                        <ul id="demo7" class="collapse">
                            <li>
                                <a class="sub-menu-item" href="#">Насосы</a>
                            </li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" class="container">
            <?php include '../admin/application/views/'.$contentView; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>
</html>