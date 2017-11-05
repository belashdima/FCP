<link rel="stylesheet" href="<?php echo $rootDirectory;?>/css/header.css">

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="header-left h-100">
                <div class="image-container">
                    <a href="<?php echo $rootDirectory;?>/index.php">
                        <!--<img src="images/logo/logo_52.png">-->
                        <img id="logo" src="images/newLogoHoriz.png">
                    </a>
                </div>
                <!--<div>
                    <span>Магазин футбольной экипировки</span>
                </div>-->
            </div>
        </div>

        <div class="col-lg-3 h-100">
            <div class="page-block">
                <a href="tel:+375296286741" class="green">+375 29 628 67 41</a>
            </div>

            <div class="page-block">
                <a href="tel:+375257918864" class="green">+375 25 791 88 64</a>
            </div>

            <div class="page-block">
                <!--<span>Email: </span>-->
                <a href="mailto:ftblcity.by@gmail.com" class="green">ftblcity.by@gmail.com</a>
            </div>

            <div class="page-block">
                <!--<span>Email: </span>-->
                <a href="https://vk.com/footballcityminsk" class="green">vk.com/footballcityminsk</a>
            </div>
            <div class="page-block">
                <!--<span>Email: </span>-->
                <a href="https://www.instagram.com/football.city" class="green">instagram.com/football.city</a>
            </div>
        </div>

        <div class="col-lg-5 h-100">
            <div class="page-block map-container">
                <div class="col-lg-6" style="display: inline; width: 50%">
                    <iframe id="mapIFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1036.9046079587044!2d27.588732761825078!3d53.91768004342265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6622282dabf5ccb7!2sFootballcity!5e0!3m2!1sru!2sby!4v1490899779874" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <a href="https://maps.google.com/maps?ll=53.917539,27.589492&z=16&t=m&hl=ru-RU&gl=BY&mapclient=embed&cid=7359488917700463799" class="green">Независимости 58, место 13, ежедневно 11:00 - 20:00</a>

                <!--<label>Связаться с нами</label>-->

                <?php
                /*                include_once 'application/views/SHeaderLocationView.php'; */?>


                <!--<label>Связаться с нами</label>

                <div id="page_wrap">
                    <a href="https://vk.me/belashdima?ref=widget" class="mail-button">Напишите нам</a>
                </div>


                <div id="vkDiv">
                    <script type="text/javascript" src="//vk.com/js/api/openapi.js?147"></script>


                    <div id="vk_contact_us"></div>
                    <script type="text/javascript">
                        VK.Widgets.ContactUs("vk_contact_us", {}, 64196181);
                    </script>
                </div>-->

                <div id="vkDiv2">
                    <script type="text/javascript" src="//vk.com/js/api/openapi.js?147"></script>


                    <div id="vk_community_messages"></div>
                    <script type="text/javascript">
                        VK.Widgets.CommunityMessages("vk_community_messages", 127607773, {expanded: "0",tooltipButtonText: "Есть вопрос?"});
                    </script>
                </div>

            </div>
        </div>
    </div>
</div>