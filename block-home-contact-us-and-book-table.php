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
                    <form action="/save" method="POST">
                        <div>
                            <input type="date" value="<?php echo date('Y-m-d'); ?>" name="book-date">
                        </div>
                        <div>
                            <input type="time" value="<?php echo date('h:i'); ?>" name="book-time">
                        </div>
                        <select name="book-table-number">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <div>
                            <button type="submit">
                                <span>Book Table</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>