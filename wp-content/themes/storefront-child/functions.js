function positionHeader() {
	var brandingContainer = document.getElementById("branding-container"),
	    header 			  =	document.getElementById("masthead"),
	    spacer 			  =	document.getElementById("spacer"),
	    offset 			  = window.pageYOffset,
	    trigger 		  = brandingContainer.offsetTop + brandingContainer.offsetHeight + 20;

	if (offset >= trigger) {
		header.style.position = "fixed";
		header.style.marginTop = "-" + trigger + "px";
		spacer.style.height = trigger + 25 + "px";
	} else {
		header.style.position = "inherit";
		header.style.marginTop = "0";
		spacer.style.height = "0";
	}
}

function stopScroll() {
	var screenWidth = screen.width;
	if (screenWidth >= 768) {
		positionHeader();
	} 
}

function positionSidebar() {
	var header = document.getElementById("masthead"),
		headerHeight = header.offsetHeight,
		sidebar = document.getElementById("secondary"),
		offset 	= window.pageYOffset,
		screenWidth = screen.width,
		orientation = window.screen.orientation.type;

	if(screenWidth <= 767) {
		if(offset <= headerHeight){
			sidebar.style.top = headerHeight + "px";
		} else if(offset > headerHeight && orientation !== "landscape-primary") {
			sidebar.style.top = 0;
			sidebar.style.position = "fixed";
		} else if( orientation == "landscape-primary") {
			sidebar.style.position = "absolute";
		}
	}
}

function toggleSidebar() {
	var sidebar = document.getElementById("secondary");
	sidebar.classList.toggle("toggle_sidebar");
}

window.addEventListener('scroll', stopScroll);

window.addEventListener('scroll', positionSidebar);




