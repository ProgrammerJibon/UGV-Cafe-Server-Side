<div class="block-home-footer">
    <div class="block">
        <div class="flex footer-flex">
            <div class="left">
                <div class="join-email-title">
                    <span>
                        Join Us & Get Updates on Special Events 
                    </span>
                </div>
                <div>
                    <label>
                        <span>
                            Enter you email
                        </span>
                        <form method="POST" onsubmit="return false">
                            <input type="email" name="newsletter_subscription" placeholder="Email address" required style="padding-left: 8px;" id="newsletter_subscription">
                            <button style="width: max-content;" onclick="newsletterSubscription1(document.querySelector('input#newsletter_subscription'), this)">
                                <div>Subscribe</div>
                            </button>
                        </form>
                    </label>
                </div>
            </div>
            <div class="right">
                <div class="social-icons">
                    <div class="social-icons">
                        <div class="social-icon">
                            <a target="_blank" href="<?php echo $info['facebook'];?>">
                                <span>
                                    <i class="fab fa-facebook"></i>
                                </span>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a target="_blank" href="<?php echo $info['twitter'];?>">
                                <span>
                                    <i class="fab fa-twitter"></i>
                                </span>
                            </a>
                        </div>
                        <div class="social-icon">
                            <a target="_blank" href="<?php echo $info['instagram'];?>">
                                <span>
                                    <i class="fab fa-instagram"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div><?php echo $info['title']; ?> &copy; 2021-<?php echo date('Y'); ?></div>
                </div>
                <div>
                    Powered by <a target="_blank" href="https://www.instagram.com/ssozdar00/">Sozdar Mohammod</a>
                </div>
                <?php echo base64_decode('CiAgICAgICAgICAgICAgICA8ZGl2IHN0eWxlPSJkaXNwbGF5OiBub25lOyI+CiAgICAgICAgICAgICAgICAgICAgUHJvZ3JhbW1pbmcgJiBNYXJrdXAgTGFuZ3VhZ2VzIGFyZSBwcm9ncmFtbWVkIGJ5ICA8YSBocmVmPSJodHRwczovL3d3dy5pbnN0YWdyYW0uY29tL1Byb2dyYW1tZXJKaWJvbi8iPlByb2dyYW1tZXJKaWJvbjwvYT4KICAgICAgICAgICAgICAgIDwvZGl2Pg==') ?>
            </div>
        </div>
    </div>
</div>