<link rel="stylesheet" href="http://localhost/Footballcity_Project/css/header.css">

<?php
$xmlMenuItems = simplexml_load_file('http://localhost/Footballcity_Project/xml/menu.xml');

?>

<header>

    <div id="info_header">

    </div>

    <nav id='cssmenu'>
        <!--<div class="logo">
            <a href="index.html">Responsive </a>
        </div>-->

        <div id="head-mobile"></div>
        <div id="expandMobileButton" class="button"></div>
        <ul class="header-ul">

            <?php foreach ($xmlMenuItems as $xmlMenuItem) { ?>
                <li>
                    <a href='http://localhost/Footballcity_Project/<?php echo $xmlMenuItem->relativeUrl; ?>'><?php echo $xmlMenuItem->rus; ?></a>
                    <ul>
                        <?php foreach ($xmlMenuItem->menuSubItems->children() as $xmlMenuSubItem) { ?>
                            <li>
                                <a href='http://localhost/Footballcity_Project/<?php echo $xmlMenuSubItem->relativeUrl; ?>'><?php echo $xmlMenuSubItem->rus; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>