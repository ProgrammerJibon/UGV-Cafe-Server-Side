<div id="top_menu_bar">
    <div class="show-menu" style="display: none;">
        <div class="logo" onclick="setState('/')">
            <img src="<?php echo $info['logo'];?>" alt="Official Logo">
        </div>
        <div class="toggle-menu">
            <button>
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <div class="menus">
        <a class="item" onclick="setState('/', '<?php echo $info['title'];?>')">
            <span>welcome</span>
        </a>
        <a class="item" onclick="setState('/menus', 'Menus | <?php echo $info['title'];?>')">
            <span>menus</span>
        </a>
        <a class="item" onclick="setState('/about-us', 'About Us | <?php echo $info['title'];?>')">
            <span>about us</span>
        </a>
        <a class="item" onclick="setState('/contact-us', 'Contact Us | <?php echo $info['title'];?>')">
            <span>contact us</span>
        </a>
        <a class="item" onclick="setState('/book-table', 'Book Table | <?php echo $info['title'];?>')">
            <span>book a table</span>
        </a>
    </div>
</div>
<script>
    var mobileMenuButton = document.querySelector("#top_menu_bar .show-menu .toggle-menu button");
    var mobileMenus = document.querySelector("#top_menu_bar .menus");
    mobileMenuButton.onclick = ()=>{
        mobileMenus.classList.toggle("max-vh");
        if (mobileMenus.classList.contains("max-vh")) {
            mobileMenuButton.querySelector("i").classList.remove("fa-bars");
            mobileMenuButton.querySelector("i").classList.add("fa-times");
        }else{
            mobileMenuButton.querySelector("i").classList.remove("fa-times");
            mobileMenuButton.querySelector("i").classList.add("fa-bars");
        }
    }

</script>