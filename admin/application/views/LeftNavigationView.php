<?php
$xmlMenuItems = simplexml_load_file($rootDirectory.'/xml/menu.xml');

?>

<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="<?php echo $rootDirectory;?>/admin/wares"">
            <i class="fa fa-fw fa-arrows-v"></i>Все товары<i class="fa fa-fw fa-caret-down"></i>
            </a>
        </li>

        <?php
        $i = 0;
        foreach ($xmlMenuItems as $xmlMenuItem) { ?>
            <li>
                <!--<a href='<?php echo $rootDirectory;?>/<?php /*echo $xmlMenuItem->relativeUrl; */?>'><?php /*echo $xmlMenuItem->rus; */?></a>-->
                <a href='javascript:;' data-toggle="collapse" data-target="#collapsible<?php echo $i; ?>">
                    <i class="fa fa-fw fa-arrows-v"></i><?php echo $xmlMenuItem->rus; ?><i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="collapsible<?php echo $i; ?>" class="collapse">
                    <?php foreach ($xmlMenuItem->menuSubItems->children() as $xmlMenuSubItem) { ?>
                        <li>
                            <a class="sub-menu-item" href='<?php echo $rootDirectory;?>/admin/<?php echo $xmlMenuSubItem->relativeUrl; ?>'><?php echo $xmlMenuSubItem->rus; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php $i++;
        } ?>

        <li>
            <a href="<?php echo $rootDirectory;?>/admin/popular_categories"">
            <i class="fa fa-fw fa-arrows-v"></i>Популярные категории<i class="fa fa-fw fa-caret-down"></i>
            </a>
        </li>
        <li>
            <a href="<?php echo $rootDirectory;?>/admin/orders"">
            <i class="fa fa-fw fa-arrows-v"></i>Заказы<i class="fa fa-fw fa-caret-down"></i>
            </a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->