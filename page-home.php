<?php require 'page-header.php';?>
<title><?php echo $info['title']; ?> - <?php echo $info['sub-title']; ?> - <?php echo date("d M, Y  H:i:sA"); ?></title>
<div id="top_menu_bar">
    <div class="menus">
        <a class="item" href="#welcome-screen">
            <span>welcome</span>
        </a>
        <a class="item" href="#menus">
            <span>menus</span>
        </a>
        <a class="item" href="#about-us">
            <span>about us</span>
        </a>
        <a class="item" href="#reservation">
            <span>reservation</span>
        </a>
        <a class="item" href="#book-a-table">
            <span>book a table</span>
        </a>
    </div>
</div>
<div class="container" id="welcome-screen">
    <div class="parallax-window" style="height: 800px;" data-parallax="scroll" data-z-index="1" data-image-src="cdn/32fc87_1039a9f6b3c14fb69dac80d04c1cf578_mv2.jpg">
        <div class="parallax-window-inset" style="height: 800px;">
            <div class="est-date">
                <span>EST. | <?php echo $info['est']; ?></span>
            </div>
            <div class="sub-title">
                <span><?php echo $info['sub-title']; ?></span>
            </div>
            <div class="title">
                <span><?php echo $info['title']; ?></span>
            </div>
            <div class="address">
                <span><?php echo $info['address']; ?></span>
            </div>
        </div>
    </div>
</div>
<div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3329.1734451905722!2d90.26575361460742!3d22.77070943140895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375549af15948eb9%3A0x3eb94856e9f31d07!2sProgrammer%20Jibon!5e1!3m2!1sen!2sus!4v1647324782824!5m2!1sen!2sus" width="100%" height="800px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<?php require 'page-footer.php';?>