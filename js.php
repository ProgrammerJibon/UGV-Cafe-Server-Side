/* <script type="text/javascript">/**/
function viewToggle(div) {
	div.classList.toggle("show")
}
function viewRemove(div) {
	div.classList.remove("show")
}


function href(link){
	if (link != null) {
		window.location.href = link;
	}	
}


function change_text_settings(input, result, which, is_pass){
	result = document.querySelector(result);
	result.innerHTML = "Please wait while changing...";
	input.disabled = true;
	input.style = "border:1px solid gray; color: gray;";
	loadLink('/json.php', [['name', which], ['value', input.value], ['is_pass', is_pass],['change_text_settings','true']]).then(db_result=>{
		result.innerHTML = db_result.settings_changed;
		setTimeout(()=>{
			input.disabled = false;
			input.style = "";
		}, 3000)
	});
}

function rgba(r, g, b, a){
	if (r < 0 || r > 255) {
		r = 0;
	}
	if (g < 0 || g > 255) {
		g = 0;
	}
	if (b < 0 || b > 255) {
		b = 0;
	}
	if (a < 0 || a > 1) {
		a = 1;
	}
	var data = "rgba("+r+", "+g+", "+b+", "+a+")";
	return data;
}

function byId(id){
	if (document.getElementById(id)) {
		return document.getElementById(id);
	}else{
		return false;
	}
}

function add_cat(button, input){
    button.disabled = true;
    button.innerHTML = "Adding...";
    loadLink('/json.php', [['add_cat_name', input.value],['set', '']]).then(result=>{
        if(result.add_cat_name){
            button.innerHTML = "Please wait...";
            window.location.reload();
        }else{
            button.innerHTML = "Try again...";
            setTimeout(() => {
                button.disabled = false;
                button.innerHTML = "Add";
            }, 3000);
        }
    })
}
function del_cat(button, div){
    if(confirm("All the menu item in this categories will be removed!\nAre sure to delete?")){
        button.innerHTML = "Deleting...";
        button.disabled = true;
        loadLink('/json.php', [['delete_cat_name', button.getAttribute('data-id')],['set', '']]).then(result=>{
            if(result.delete_cat_name == true){
                div.remove();
				window.location.reload();
            }else{
                button.innerHTML = "Try again...";
                setTimeout((e)=>{
                    button.disabled = false;
                }, 3000);
            }
        });
    }    
}
function edit_cat(button, input){
    var input_event = input.onclick;
    var button_event = button.onclick;
	input.disabled = false;
    input.onclick = (e)=>{};
    input.focus();
    button.innerHTML = "Save";
    button.onclick=(e)=>{
        button.disabled = true;
        input.disabled = true;
        button.innerHTML = "Saving...";
        loadLink('/json.php', [['edit_cat_name', input.getAttribute('data-id')],['set', input.value]]).then(result=>{
            button.disabled = false;
            if(result.edit_cat_name == true){
                button.innerHTML = "Saved";
            }else{
                button.innerHTML = "Try again...";
            }
            setTimeout((e)=>{
                button.innerHTML = "Edit";
                button.onclick = button_event;
                input.onclick = input_event;
            }, 3000);
        });
            
    }
}
function notification(text, color){
	if (document.getElementById("event_5")) {
		var view = document.getElementById("event_5");
		var newDiv = document.createElement("div");
		newDiv.classList.add("notification");
		newDiv.innerHTML = text;
		view.appendChild(newDiv);
		newDiv.onclick=e=>{
			setTimeout(v=>{
				newDiv.style = "";
			}, 100);
			setTimeout(v=>{
				newDiv.remove();
			}, 300);
		}
		setTimeout(v=>{
			newDiv.style = "";
		}, 20000);
		setTimeout(v=>{
			newDiv.remove();
		}, 20300);
		var newInterval = setInterval(e=>{
			colorx = rgba(Math.floor(Math.random()*255+1),Math.floor(Math.random()*255+1),Math.floor(Math.random()*255+1), 1);
			newDiv.style = "color:"+colorx+";padding: 8px 16px;height: 35px;border: 1px solid;opacity: 1;border-radius: 3px;font-size: 11px;margin-bottom: 4px;";
		},250);

		setTimeout(v=>{
			newDiv.style = "color:"+color+";padding: 8px 16px;height: 35px;border: 1px solid;opacity: 1;border-radius: 3px;font-size: 11px;margin-bottom: 4px;";
			clearInterval(newInterval);
		}, 3000);
	}
}

function loadLink(url, data){
	// loadLink('/json.php', [['name','jibon'],['bool','false']]).then(result=>{console.log(result)})
	return new Promise(function(resolve, reject){

		var http = new XMLHttpRequest();
		var loader = document.querySelector(".progressbar .progress");
		loader.style = `width: 20%;`;
		http.open("POST", url);
		var formData = new FormData();
		if (data != null) {
			data = [...data];
			data.forEach((post)=>{
			  if (post[0] && post[1]) {
			  	formData.append(post[0], post[1]);
			  }
			})
		}
		http.send(formData);
		http.onprogress=(e)=>{
			e.total = contentLength = parseInt(e.target.getResponseHeader('x-decompressed-content-length'), 10);
			var loaded = e.loaded*100/e.total;
			loader.style = `width: 10%;`;
			if (loaded < 100) {
				loader.style = `width: ${Math.floor(loaded)}%;`;
			}
			loader.innerHTML = "";
			// console.log(e);
		}
		http.onload=()=>{
			resolve(JSON.parse(http.responseText));
			loader.style = `width: 100%;`;
			setTimeout(()=>{
				loader.style = '';
			}, 1000)
			if (contentDisposition = http.getResponseHeader('content-disposition')) {
				console.log(contentDisposition.split('filename=')[1].split(';')[0]);
			}
			
		}
	});
}
function imageSlider(div, imageLinks, links, extras) {

	/*window.onresize=()=>{
		setTimeout(()=>{
			div.innerHTML = "";
			imageSlider(div, imageLinks, links, extras)
		}, 1000)
	}*/

	extras.dots = extras.dots || false;
	extras.buttons = extras.buttons || false;
	let interval = extras.interval || 1000;

	const slideWidth = div.clientWidth;
	const slideHeight = div.clientHeight;

	var slider = document.createElement("div");
	slider.classList.add("slider");
	slider.style.width = slideWidth+"px";

	var images = document.createElement("div");
	images.classList.add("images");

	var dots = document.createElement("div");
	dots.classList.add("dots");

	var image = [];
	var dotting = [];

	var full_screen_view = document.createElement("div");
	full_screen_view.classList.add("full_screen_view");
	var fsImage = document.createElement("img");
	full_screen_view.appendChild(fsImage);

	full_screen_view.onclick=()=>{
		full_screen_view.style.width = "0vw";
		full_screen_view.style.height = "0vw";
	}
if (imageLinks.length == 1) {
		interval = 3210;
	}
	imageLinks.forEach((imageLink, index)=>{
		var newImage = document.createElement("div");
		newImage.classList.add("image");
		var imageSrc = document.createElement("img");
		imageSrc.src = imageLink;
		imageSrc.style.width = slideWidth;
		imageSrc.style.height = slideHeight;
		newImage.appendChild(imageSrc);
		newImage.style.background = `url(${imageLink})`;
		images.appendChild(newImage);

		if (links[index]) {
			newImage.onclick=()=>{
				window.location.href = links[index]
			}
		}else if (extras.expand) {
			var newDivImg = document.createElement("div");
			newDivImg.classList.add("over_button");
			newDivImg.classList.add("fas");
			newDivImg.classList.add("neon_light");
			newImage.appendChild(newDivImg);
			newDivImg.onclick=()=>{
				full_screen_view.querySelector("img").src = imageLink;
				full_screen_view.style.width = "100vw";
				full_screen_view.style.height = "100vh";
			}

		}
		image[index] = newImage;

		var dotX = document.createElement("div");
		dotX.classList.add("dotX");
		var dot = document.createElement("div");
		dot.classList.add("dot");
		dotX.appendChild(dot);
		dots.appendChild(dotX);
		dotting[index] = dotX;
		dotting[0].querySelector(".dot").style.boxShadow = "0px 0px 0px 0px #ff00b1, 0px 0px 4px 1px #ff00b1, 0px 0px 8px 2px #ff00b1, 0px 0px 20px 4px #ff00b1";
	})

	var buttons = document.createElement("div");
	buttons.classList.add("buttons");
	var next = document.createElement("div");
	next.classList.add("next");
	next.classList.add("icon");
	buttons.appendChild(next);
	var prev = document.createElement("div");
	prev.classList.add("prev");
	prev.classList.add("icon");
	buttons.appendChild(prev);

	slider.appendChild(images);
	if (extras.buttons == true) {
		slider.appendChild(buttons);
	}
	if (extras.dots == true) {
		slider.appendChild(dots);
	}
	div.appendChild(slider);
	div.appendChild(full_screen_view);


	var index = 1;
	var lastInterval;
	let pressed = false;
	let startX = 0;
	let x = 0;
	let lastX = 0;


	var firstClone = image[0].cloneNode(true);
	var lastClone = image[image.length - 1].cloneNode(true);
	images.append(firstClone);
	images.prepend(lastClone);
	image = images.querySelectorAll(".image");


	images.style.transform = `translateX(${-slideWidth * index}px)`;

	const startSlide=(e)=>{
		if (interval != 3210) {
			lastInterval = setInterval(()=>{
				nextSlide();
			}, interval);
		}			
	}
	const nextSlide=(e)=>{
		if (index >= (image.length - 1)){return false;}	
		index++;
		images.style.transform = `translateX(${-slideWidth * index}px)`;
		images.style.transition = `all ${interval/3000}s ease-in-out`;
	}
	const prevSlide=(e)=>{
		if (index <= 0){
			index = image.length - 2;
			images.style.transition = `none`;
		}else{
			index--;
		}		
		images.style.transform = `translateX(${-slideWidth * index}px)`;
	}
	const slideMove = e =>{
		if (!pressed) {
			return false;
		}
		x = e.pageX;
		if(((image.length - 2) == index) && (lastX - x) > 0){
			return false;
		}else if((1 == index) && (lastX - x) <= 0){
			return false;
		}else{
		
		}

		images.style.transition = `all ${interval/30000}s ease-in-out`;
		images.style.transform = `translateX(${x - startX}px)`;
	}
	const sliderUp = e=>{
		clearInterval(lastInterval);
		let increase = -0.25;
		if ((lastX - x) > 0) {
			increase = 0.25;
		}
		index = Math.round(((-1*images.style.transform.match(/(-?[0-9\.]+)/g)[0]) / slideWidth) + increase);
		slider.style.cursor = "grab";
		pressed = false;
		index --;
		nextSlide();
	}
	div.onmouseleave=()=>{
		sliderUp();
		startSlide();
	}
	const sliderDown=e=>{
		startX = e.pageX - images.style.transform.match(/(-?[0-9\.]+)/g)[0];
		slider.style.cursor = "grabbing";
		lastX = e.pageX;
		pressed = true;
	}

	dotting.forEach((dots, i)=>{
		dots.onclick=()=>{
			index = i + 1;
			images.style.transform = `translateX(${-slideWidth * index}px)`;
		}
	})

	images.ontransitionstart=()=>{
		dotting.forEach((dots, index)=>{
			dots.querySelector(".dot").style.boxShadow = "";
		})
		if (imageLinks.length >= index && index > 0) {
			dotting[index-1].querySelector(".dot").style.boxShadow = "0px 0px 0px 0px #ff00b1, 0px 0px 4px 1px #ff00b1, 0px 0px 8px 2px #ff00b1, 0px 0px 20px 4px #ff00b1";
		}else if(index == 0){
			dotting[imageLinks.length-1].querySelector(".dot").style.boxShadow = "0px 0px 0px 0px #ff00b1, 0px 0px 4px 1px #ff00b1, 0px 0px 8px 2px #ff00b1, 0px 0px 20px 4px #ff00b1";
		}else{
			dotting[0].querySelector(".dot").style.boxShadow = "0px 0px 0px 0px #ff00b1, 0px 0px 4px 1px #ff00b1, 0px 0px 8px 2px #ff00b1, 0px 0px 20px 4px #ff00b1";
		}
	}
	images.ontransitionend = ()=>{
		if (image[index] == firstClone) {
			images.style.transition = `none`;
			index = 1;
			images.style.transform = `translateX(${-slideWidth * index}px)`;
		}else{
			images.style.transition = `all ${interval/3000}s ease-in-out`;
		}
	}

	next.onclick = (e)=>{
		nextSlide();
	}
	prev.onclick= (e)=>{
		prevSlide();
	}



	//dragging event



	slider.onmouseenter=(e)=>{
		clearInterval(lastInterval);
		slider.style.cursor = "grab";
		pressed = false;
	}
	slider.onmouseleave=(e)=>{
		pressed = false;
		startSlide();
	}
	slider.onmousedown=(e)=>{
		sliderDown(e)
	}
	slider.onmouseup=e=>{
		sliderUp(e)
	}
	slider.onmousemove=e=>{
		slideMove(e);
	}


	slider.ontouchend=(e)=>{
		if (e.changedTouches[0]) {
			sliderUp(e.changedTouches[0]);
			startSlide();
		}
		
	}
	slider.ontouchstart=e=>{
		if (e.touches[0]) {
			clearInterval(lastInterval);
			sliderDown(e.touches[0])
		}
		
	}
	slider.ontouchmove=e=>{
		if (e.touches[0]) {
			slideMove(e.touches[0]);
		}
		
	}



	startSlide();
}
function window_onload(){
	window.onpopstate();
	var move_bg_position_body = 1;
	document.querySelector("body").style.backgroundPosition = `${move_bg_position_body}px ${move_bg_position_body/2}px`;
	setInterval(() => {
		document.querySelector("body").style.backgroundPosition = `${move_bg_position_body}px ${move_bg_position_body/2}px`;
		move_bg_position_body+=10;
	}, 1000);
	if (document.querySelector('div.require_pass')) {
		function ask_admin_pass(msg){
			msg = msg || "Enter password";
			var x = prompt(msg);
			if (x == null) {
				window.location.assign("/");
			}else if(x == false){
				window.location.assign("/");
			}else{
				loadLink('/json.php', [['admin_pass_enter', x],['bool','false']]).then(result_admin_pass=>{
					if (result_admin_pass.login && result_admin_pass.login == "reload") {
						window.location.reload();
					}else if (result_admin_pass.login){
						ask_admin_pass(result_admin_pass.login);
					}else{
						ask_admin_pass("Check your connection and try again letter...");
					}
				})
			}
		}
		if (body = document.querySelector('body')) {
			if ((body.style.background = "black") && (body.style.color = "white")) {
				alert('Entering wrong password will make you wait 30 sec everytime');
				ask_admin_pass();
			}
		}
	}
}



window.onpopstate = (e) =>{ 
	var search = window.location.search;
	var pathname = window.location.pathname;
	var content = document.querySelector(".content");
	if(document.getElementById('style1')){
		document.getElementById('style1').remove();
	}

	pathname = pathname.split("/")[1];

	console.log(pathname);
	checkPathName(pathname);
}


function setState(link, title){
	var data = [];
	if (title != '') {
		data.title = title;
	}
	window.history.pushState(link, null, link);
	var pathname = window.location.pathname;
	pathname = pathname.split("/")[1];


	if(title){
		document.querySelectorAll("title").forEach(item=>{
			if (data.title) {
				if (data.title != "") {
					item.innerHTML = data.title;
					item.title = data.title;				
				}			
			}
		});
	}
	

	window.onpopstate();
}


function checkPathName(path){
	if(path){
		if(path == "about-us"){
			document.querySelector("div#about-us view").scrollIntoView({ behavior: 'smooth', block: 'center' });
		}else if(path == "contact-us"){
			document.querySelector("div#contact-us view").scrollIntoView({ behavior: 'smooth', block: 'center' });
		}else if(path == "book-table"){
			document.querySelector("div#book-table view").scrollIntoView({ behavior: 'smooth', block: 'center' });
		}else if(path == "menus"){
			if(document.querySelector("div#menus").style.display = "block"){
				document.querySelector("div#menus view").scrollIntoView({ behavior: 'smooth', block: 'center' })
				loadLink('/json.php', [['menus','block-home'],['bool','false']]).then(result=>{
					if((menu_items = result.menu_items) && (menu_cats = result.menu_cats) && (main_menus_div = document.querySelector("#menus .menus-container"))){
						var menu_categories = document.createElement("div");
						menu_categories.classList.add("menu_categories");
						menu_cats.forEach((cat_item, cat_pos)=>{
							var all_menu_items = document.createElement("div");
							all_menu_items.classList.add("menus_column");
							var menu_categories_name = document.createElement("div");
							menu_categories_name.classList.add("menu_categories_name");

							menu_categories_name.innerHTML = cat_item.name;

							menu_items.forEach((item, pos)=>{
								if(item.menu_cats_id == cat_item.id){
									var new_menu_item = document.createElement("div");
									new_menu_item.classList.add("menus_row");

									var new_menu_item_details = document.createElement("div");
									new_menu_item_details.classList.add("menu_item_details");

									var new_menu_item_name_price = document.createElement("div");
									new_menu_item_name_price.classList.add("menu_item_name_price");

									var new_menu_item_img_div = document.createElement("div");
									new_menu_item_img_div.classList.add("menu_item_img");
									var new_menu_item_img = document.createElement("img");
									new_menu_item_img.src = item.pic;
									new_menu_item_img_div.appendChild(new_menu_item_img);

									var new_menu_item_name_div = document.createElement('div');
									new_menu_item_name_div.classList.add('menu_item_name');
									new_menu_item_name_div.innerHTML = item.name;

									var new_menu_item_price_div = document.createElement('div');
									new_menu_item_price_div.classList.add("menu_item_price");
									new_menu_item_price_div.innerHTML = item.price;

									var new_menu_item_comment_div = document.createElement('div');
									new_menu_item_comment_div.classList.add("menu_item_comment");
									new_menu_item_comment_div.innerHTML = item.comment;

									new_menu_item_name_price.appendChild(new_menu_item_name_div);
									new_menu_item_name_price.appendChild(new_menu_item_price_div);

									new_menu_item_details.appendChild(new_menu_item_name_price);
									new_menu_item_details.appendChild(new_menu_item_comment_div);

									new_menu_item.appendChild(new_menu_item_img_div);
									new_menu_item.appendChild(new_menu_item_details);
									
									all_menu_items.appendChild(new_menu_item);
								}								
							});
							menu_categories.appendChild(menu_categories_name);
							menu_categories.appendChild(all_menu_items);
						});
						main_menus_div.innerHTML = "";
						main_menus_div.appendChild(menu_categories);
						$(function() {
							$(window).trigger('resize').trigger('scroll');
						});
					}
				})
			}
		}else if(path == "admin"){

		}else{
			window.location.assign(path);
		}
	}else if(path == ""){
		document.querySelector("div#top").scrollIntoView({ behavior: 'smooth', block: 'center' });
	}
}


function newsletterSubscription1(input, button){
	button.disabled = true;
	loadLink('/json.php', [['newsletter_subscription',input.value],['bool','false']]).then(result=>{
		button.innerHTML = result.newsletter_subscription;
		input.innerHTML = "";
	});
}