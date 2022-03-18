<?php header("content-type: text/css"); ?>
/*<style type="text/css">/**/

:root{
    --primary: #ff5e00;
    --optional: #2c0006/*#4f0912 #ff5200*/;
    --optional-2: #160003;
}

html{
    background-color: var(--optional);
}
body{
	/*background: #212529;*/
	margin: 0;
	padding: 0;
	min-height: 100vh;
	font-family: sans-serif;
	font-size: 14px;
	user-select: none;
	max-width: calc(100vw - 10px);
    background: url('cdn/jhiliks.webp');
    background-attachment: fixed;
    background-position-x: 0px;
    background-position-y: 0px;
    transition: background 1s linear;
}
select:hover{
	background: white !important;
	color: red !important;
}
select{
	text-align: left !important;
}
select:focus{
	box-shadow: none !important;
}
input:hover{
	background: white !important;
	color: red !important;
}
input{
	text-align: left !important;
}
input:focus{
	box-shadow: none !important;
}
textarea:hover{
	background: white !important;
	color: red !important;
}
textarea{
	text-align: left !important;
}
textarea:focus{
	box-shadow: none !important;
}
a{
    color: unset;
}
::-webkit-scrollbar {
  width: 10px;
  cursor: pointer;
}::-webkit-scrollbar-track {
  background: #f1f1f1;
}::-webkit-scrollbar-thumb {
  background: #d0d0d0;
}::-webkit-scrollbar-thumb:hover {
  background: #555;
}
input {
	outline: none;
	border-color: solid lightgray;
	font-size: 12px;
	padding: 4px 8px;
}
*{
	/* font-family: Raleway,sans-serif; */
	user-select:  text;
	pointer-events: auto;
	transition: all 0.15s ease-in-out;
	box-sizing: border-box;
    scroll-behavior: smooth;
}

img{
	height: 100%;
	width: 100%;
	object-fit: cover;
    pointer-events: none;
}
.data-loader {
	background: white;height: 1px;width: 100%;max-width: 100vw;
	transition: all 1s ease-in-out;
}
.data-loader .loaded{
	width: 0%;height: 100%;background: #2ca96c;
	transition: all 1s ease-in-out;
}


/** animated border **/
.anim_border{
    border: 2px solid;
    --angle: 0deg;
    border-image: linear-gradient(var(--angle), rgba(0,249,255,1) 0%, rgba(255,0,59,1) 100%) 1;
    animation: 0.3s anim_border linear infinite;
}
@keyframes anim_border {
	to {
	--angle: 360deg;
	}
}
@property --angle {
	syntax: '<angle>';
	initial-value: 0deg;
	inherits: false;
}

.parallax-window {
    background: transparent;
}
.parallax-mirror{
    transition: none;
}
.parallax-mirror *{
    transition: none;
}
.parallax-window-inset{
    position: relative;
    z-index: 2;
}

/* error style */
.server_returns_error{
	max-width: 100vw;
	height: calc(100vh - 85px);
	display: block;
	pointer-events: none;
	cursor: not-allowed;
	overflow: hidden;
	position: relative;
	z-index: -1;
}
.server_returns_error .error_block{
	position: absolute;
	top:  40%;
	left: 50%;
	transform: translate(-50%, -50%);
	display: inline-block;
	backdrop-filter: blur(10px);
	border-radius: 10px;
	padding: 30px;
	background: rgb(255 255 255 / 20%);
	margin: 16px;
}
.server_returns_error .error_block span{
	display: block;
	text-align: center;
}
.server_returns_error .error_block .error_code{
	font-size: 150px;
  	font-family: fantasy;
}
.server_returns_error .error_block .error_code:after{
	content: '!';
}
.server_returns_error .error_block .error_desc{
	font-family: cursive;
  font-weight: bold;
  font-size: 30px;
}





hr{
	border-top: 0px solid transparent;
	border-bottom: 1px solid #a9a9a9 !important;
}





/*Slider functionality*/

.slider:hover{
	box-shadow: 2px 2px 10px -5px grey;
}
.slider {
	box-shadow: 0px 0px 10px 0px transparent;
	width: 100%;
	height: 100%;
	overflow: hidden;
	position: relative;
	transition: all 0.3s;
}
.slider .images {
	width: 100%;
    height: 100%;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    align-items: center;
}
.slider .images .image {
	height: 100%;
	min-width: 100%;
	position: relative;
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
}
.full_screen_view img{
	height: 100vh;
	width: 100vw;
	object-fit: contain;
	padding: 5vh 5vw;
}

.slider .images .image .over_button:after{
	content: "";
	color: #ff0025;
	background: transparent;
	font-size: 20px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
.slider .images .image .over_button{
	position: absolute;
    top: 10px;
    height: 40px;
    width: 40px;
    right: 10px;
    cursor: pointer;
    font-size: 0px;
    border-radius: 50%;/*
    box-shadow: 0 0 20px 4px #00000059;*/
    backdrop-filter: blur(1px);
}
.full_screen_view{
	position: fixed;
    height: 0vh;
    width: 0vw;
    background: #000000c4;
    z-index: 999999;
    top: 0;
    left: 0;
    cursor: zoom-out;
    transition: all 0.5s ease-in-out;
    overflow-x: hidden;
    overflow-y: scroll;
}
/*.full_screen_view:after {
    content: "X";
    color: white;
    position: fixed;
    right: 4%;
    top: 5%;
    display: inline-flex;
    width: 35px;
    height: 35px;
    font-family: cursive;
    border-radius: 50%;
    border: 1px solid;
    background: transparent;
    font-size: 20px;
    align-content: center;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}*/
.slider .images .image img{
	width: 100%;
	height: 100%;
	pointer-events: none;
	object-fit: cover;
	backdrop-filter:  blur(50px);
}

.slider .dots {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    display: flex;
    flex-wrap: nowrap;
    flex-direction: row;
    margin: 0 auto;
    justify-content: center;
    opacity: 1;
}
.slider .dots .dotX:hover .dot{
	transform: scale(1.5);
	box-shadow: 0px 0px 0px 0px #ff00b1, 0px 0px 4px 1px #ff00b1, 0px 0px 8px 2px #ff00b1, 0px 0px 20px 4px #ff00b1;
}
.slider .dots .dotX {
    cursor: pointer;
    padding: 16px;
}
.slider .dots .dot{
	height: 8px;
	width: 8px;
	overflow: hidden;
	border-radius: 50%;
	cursor: pointer;
	margin: 0 auto;
	background: white;
	border: 1px #ff00b1;
}
.slider .buttons {
	width: 0px;
	height: 0px;
	opacity: 0;
}
.slider:hover .buttons, .slider:hover .dots{
	opacity: 1;
}
.slider .prev{
	background: linear-gradient(90deg, #0000004d, transparent);
	left: 0;
}
.slider .next{
	background: linear-gradient(270deg, #0000004d, transparent);
	right: 0;
}
.slider:hover .prev, .slider:hover .next {
    cursor: pointer;
    font-size: 32px;
    padding: 0 20px;
    position: absolute;
    top: 0;
    bottom: 0;
}
.slider .buttons .prev, .slider .buttons .next {
    transition: all 0.3s ease-in-out;
    color: white;
    height: 100%;
    text-align: center;
    display: grid;
    align-items: center;
    position: absolute;
}







.toTop{
    position: fixed;
    bottom: 10%;
    right: 40px;
    z-index: 99;
    cursor: pointer;
    background: white;
    border: 1px solid rgb(249 193 166);
    padding: 10px;
    border-radius: 50%;
    text-align: center;
    display: none;
    color: rgb(249 193 166);
    width: 40px;
    height: 40px;
}


@media (max-width: 992px){

	
}
@media (max-width: 768px){
	
}
@media (max-width: 575px){
	
}

.notification {
    cursor: zoom-out;
    user-select: none;
    backdrop-filter: blur(10px);
    color: gray;
    padding: 0px 0px;
    height: 0px;
    border-radius: 300px;
    font-family: cursive;
    letter-spacing: 1px;
    font-size: 0px;
    border: 1px solid;
    margin-bottom: 0px;
    opacity: 0;
    margin-bottom: 0px;
    overflow: hidden;
    font-weight: lighter;
    background: rgba(0, 0, 0, 0.5);
}

#event_5 {
    user-select: none;
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: fit-content;
    transition: all 0.3s ease-in-out;
    z-index: 999999999;
}



.neon_light {
    font-size: 50px;
    font-family: /*"Vibur",*/ cursive;
    color: #fff;
    text-shadow: 0 0 7px #fff, 0 0 10px #fff, 0 0 21px #fff, 0 0 42px #fba500, 0 0 82px #fba500, 0 0 92px #fba500, 0 0 102px #fba500, 0 0 151px #fba500;
}











/*****************************************************************************************/


#top_menu_bar{
    background: var(--optional);
    position: sticky;
    top: 0;
    z-index: 999;
    box-shadow: 0 0 15px -5px var(--optional-2);
    border: 1px solid #16000347;
}
#top_menu_bar *{
    user-select: none;
}
#top_menu_bar .menus{
    display: flex;
    max-width: 800px;
    margin: 0 auto;
    align-content: center;
    justify-content: space-evenly;
    align-items: center;
}
#top_menu_bar .menus .item{
    text-decoration: none;
    color: white;
    line-height: 75px;
    width: 100%;
    text-align: center;
    text-transform: capitalize;
    font-family: sans-serif;
}
#top_menu_bar .menus .item:hover{
    text-decoration: underline;
    background-color: #00000017;
}


#welcome-screen {
    height: 100%;
    font-family: Raleway,sans-serif;
}
#welcome-screen .est-date{
    color: #fb953e;
    position: absolute;
    top: 50px;
    left: 50%;
    right: 0;
    transform: translate(-50%);
    letter-spacing: 8px;
    font-size: 16px;
}
#welcome-screen .title {
    font-size: 102px;
    color: white;
    position: absolute;
    bottom: 20%;
    left: 15%;
    right: 0;
}
#welcome-screen .sub-title {
    font-size: 14px;
    color: white;
    position: absolute;
    bottom: calc(20% + 102px);
    left: 0;
    right: 0;
    text-align: center;
    font-weight: 100;
}
#welcome-screen .address {
    font-size: 14px;
    color: white;
    position: absolute;
    bottom: 5%;
    left: 0;
    right: 0;
    text-align: center;
    font-weight: 100;
}

#scroll_to_top_arrow_btn {
    position: fixed;
    bottom: 5%;
    right: 5%;
    z-index: 99;
    display: block;
    height: 50px;
    width: 50px;
    border: 1px solid white;
    border-radius: 50%;
    overflow: hidden;
    background: var(--optional);
    fill: white;
    padding: 16px;
}
#scroll_to_top_arrow_btn:hover{
    background-color: var(--primary);
}


#top-categories .block{
    max-width: 1000px;
    margin: 0 auto;
    padding: 64px 0 ;
}
#top-categories .block .item {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-around;
}
#top-categories .block .item .block-item{
    padding: 16px;
    flex: 0 0 50%;
}
#top-categories .block .item .block-item img{
    width: 450px;
    height: 450px;
    object-fit: cover;
}
#top-categories .block .item .block-item .head{
    color: var(--primary);
    font-family: Raleway,sans-serif;
    font-size: 18px;
    letter-spacing: 4px;
}
#top-categories .block .item .block-item .title{
    font-size: 30px;
    font-family: cursive;
    text-transform: uppercase;
    letter-spacing: 8px;
    padding: 16px 0;
    display: block;
    color: white;
}
#top-categories .block .item .block-item .desc{
    color: var(--primary);
    letter-spacing: 1px;
    font-family: Raleway,sans-serif;
}


#about-us{
    padding: 64px 0 ;
}
#about-us .header {
    text-align: center;
    color: var(--primary);
    text-transform: uppercase;
    font-size: 18px;
    letter-spacing: 8px;
}
#about-us .title {
    text-align: center;
    color: white;
    text-transform: lowercase;
    font-size: 32px;
    letter-spacing: 4px;
    padding: 32px 0 64px 0;
    font-family: monospace;
}
#about-us .desc {
    max-width: 1000px;
    margin: 0 auto;
    padding: 64px 0;
    color: var(--primary);
    letter-spacing: 2px;
    word-spacing: 4px;
    line-height: 32px;
    text-transform: uppercase;
}



#contact-us{
    padding: 32px 0 64px 0;
}
#contact-us .block{
    max-width: 1000px;
    margin: 0 auto;
}
#contact-us .block .flex {
    display: flex;
    flex-wrap: wrap;
}
#contact-us .block .item {
    flex: 0 0 50%;
    min-width: fit-content;
}
#contact-us .block .item .contact-header {
    font-size: 25px;
    color: white;
    padding-bottom: 100px;
    font-family: cursive;
    letter-spacing: 4px;
}
#contact-us .block .item .contact-desc{
    color: var(--primary);
}
#contact-us .block .item .contact-desc .contact-mel {
    display: flex;
    align-items: center;
    align-content: center;
    flex-direction: row;
    padding: 8px 0;
}
#contact-us .block .item .contact-desc .contact-mel .fas{
    padding-right: 8px;
}








#contact-us .block #book-table.item{
    padding-top: 8px;
}
#contact-us .block #book-table.item .book-title {
    color: var(--primary);
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 4px;
    padding-bottom: 32px;
}
input, select, button {
    width: 300px;
    margin: 8px 0;
    height: 40px;
    background: transparent;
    color: var(--primary);
    border: 1.5px solid var(--primary);
    padding: 0 32px;
    color-scheme: dark;
}
input:hover, select:hover, input:focus, select:focus{
    background: #ffffff2b !important;
}
button {
    background: var(--primary);
    color: var(--optional);
    cursor: pointer;
}
button:hover{
    border: 1.5px solid var(--optional);
    color: white;
    transition: none;
}
label span{
    color: white;
    padding-top: 32px;
    display: inline-block;
}








.block-home-footer{
    padding-top: 50px;
    background-color: var(--optional-2);
    background-image: url(cdn/jhiliks.webp);
    background-position: center;
    background-attachment: fixed;
    background-repeat: repeat;
}
.block-home-footer .block{
    max-width: 1000px;
    margin: 0 auto;
}
.block-home-footer .block .flex{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    align-content: center;
}
.block-home-footer .block .flex.footer-flex{
    padding: 100px 0;
}
.block-home-footer .block .flex .left .join-email-title{
    color: white;
    font-family: monospace;
    letter-spacing: 2px;
}
.block-home-footer .block .flex .right{
    text-align: right;
}
.block-home-footer .block .flex .right{
    color: var(--primary);
}
.block-home-footer .block .flex .right a{
    font-weight: bold;
}
.block-home-footer .block .flex .right .copyright{
    padding: 8px 0;
}
.block-home-footer .block .social-icons {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    align-content: center;
}
.block-home-footer .block .social-icons .social-icon a{
    padding: 8px;
    font-size: 25px;
    display: inline-block;
    color: white;
}







@media screen and (max-width: 1000px){
    #welcome-screen .title{
        font-size: 40px;
        left: 0;
        text-align: center;
    }
    #welcome-screen .sub-title{
        bottom: calc(20% - 20px);
        left: 0;
        text-align: center;
    }
    #top-categories .block .item .block-item{
        padding: 16px;
        flex: 0 0 100%;
    }
    #top-categories .block .item .block-item img{
        width: 100%;
    }
    #about-us .desc{
        padding: 64px 16px;
    }
    #contact-us{
        padding: 32px 16px 64px 16px;
    }
    #contact-us .block .flex {
        display: flex;
        text-align: center;
        flex-wrap: wrap;
        justify-content: center;
    }
    #contact-us .block .item .contact-desc .contact-mel{
        justify-content: center;
    }
    .block-home-footer .block .flex.footer-flex{
        padding: 100px 16px;
    }
    .block-home-footer .block .flex .right{
        text-align: center;
        width: 100%;
    }
    #top_menu_bar .show-menu{
        display: flex !important;
        align-content: center;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
    }
    #top_menu_bar .menus{
        flex-direction: column;
        max-height: 0px;
        overflow: hidden;
    }
    #top_menu_bar .show-menu .toggle-menu button{
        width: max-content;
        background: var(--optional-2);
        box-shadow: 0 0 8px -2px #ff000d;
        border: 1px solid #ff000d;
        color: #ff000d;
    }
    #top_menu_bar .menus .item{
        border-bottom: 1px solid #340007;
        border-top: 1px solid #340007;
    } 
    .max-vh{
        max-height: 100vh !important;
    }
    #top_menu_bar .show-menu .logo{
        width: 80px;
    }
    .parallax-window{
        width: 100vw;
        height: calc(100vw*(9/16)) !important;
    }
    .parallax-window .parallax-window-inset{
        width: 100vw;
        height: calc(100vw*(9/16)) !important;
    }
    .block-home-footer .block .social-icons {
        justify-content: center;
    }
}