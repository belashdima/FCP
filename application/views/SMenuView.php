<link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/menu.css">

<?php
$xmlMenuItems = simplexml_load_file($rootDirectory.'/xml/menu.xml');

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
                    <a href='<?php echo $rootDirectory;?>/<?php echo $xmlMenuItem->relativeUrl; ?>'><?php echo $xmlMenuItem->rus; ?></a>
                    <ul>
                        <?php foreach ($xmlMenuItem->menuSubItems->children() as $xmlMenuSubItem) { ?>
                            <li>
                                <a href='<?php echo $rootDirectory;?>/<?php echo $xmlMenuSubItem->relativeUrl; ?>'><?php echo $xmlMenuSubItem->rus; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>