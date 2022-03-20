<div id="contact-us">
    <view></view>
    <div class="block">
        <div class="flex">
            <div class="item">
                <div class="contact-header">
                    <span>
                        CONTACT US
                    </span>
                </div>
                <div class="contact-desc">
                    <div class="contact-mel">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>
                            <?php
                                $address_cutter = explode("\n", $info['address']);
                                foreach($address_cutter as $address_cutted){
                                    echo $address_cutted."</br>";
                                }
                            ?>
                        </span>
                    </div>
                    <div class="contact-mel">
                        <i class="fas fa-clock"></i>
                        <span>
                            <?php echo $info['open'];?>
                        </span>
                    </div>
                    <br>
                    <div class="contact-mel">
                        <i class="fas fa-phone"></i> 
                        <a href="tel:<?php echo $info['phone'];?>" target="_blank" style="user-select: all; text-decoration: underline;">
                            <?php echo $info['phone'];?>
                        </a>
                    </div>
                    <div class="contact-mel">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:<?php echo $info['email'];?>" target="_blank" style="user-select: all; text-decoration: underline;">
                            <?php echo $info['email'];?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item" id="book-table">
                <view></view>
                <div class="book-title">
                    <span>BOOK A TABLE</span>
                </div>
                <div>
                    <form action="/json.php" method="POST">
                        <?php
                        if (isset($_GET['booking'])) {
                            if ($_GET['booking'] == "true") {
                                echo '
                                <div>
                                    <h2 style="max-width: 100%;">
                                        <font color="green">
                                            Your booking is confirmed.</br> Check your email please.
                                        </font>
                                    </h2>
                                </div>
                                ';
                            }else{
                                echo '
                                <div>
                                    <h2 style="max-width: 100%;">
                                        <font color="red">
                                            Something went wronge.</br>Please try again letter.
                                        </font>
                                    </h2>
                                </div>
                                ';
                            }
                        }
                        ?>
                        <div>
                            <input required type="date" value="<?php echo date('Y-m-d'); ?>" name="book_date">
                        </div>
                        <div>
                            <input required type="time" value="<?php echo date('h:i'); ?>" name="book_time">
                        </div>
                        <div>
                            <input required type="text" placeholder="Full Name" name="book_name">
                        </div>
                        <div>
                            <input required type="email" placeholder="Email Address" name="book_email">
                        </div>
                        <div>
                            <input required type="phone" placeholder="Phone Number" name="book_phone">
                        </div>
                        <select name="book_person_count" id="book_table_number">
                            <option value="1" selected>1 Person</option>
                        </select>
                        <script>
                            var book_table_number = document.querySelector("select#book_table_number");
                            for (var i = 2; i <= 100; i++) {
                                book_table_number.innerHTML += `<option value="${i}">${i} Person</option>`;
                            }
                        </script>
                        <div>
                            <button type="submit" name="book_a_table_now">
                                <span>Book Table</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>