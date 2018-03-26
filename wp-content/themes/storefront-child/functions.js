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
	var screenWidth 	  = screen.width;
	if (screenWidth >= 768) {
		positionHeader();
	} else {

	}
}

function positionSidebar() {
	var header = document.getElementById("masthead"),
		headerHeight = header.offsetHeight,
		sidebar = document.getElementById("secondary");
		
	sidebar.style.top = headerHeight + "px";
}

function toggleSidebar() {
	var sidebar = document.getElementById("secondary");
	sidebar.classList.toggle("toggle_sidebar");
}

window.addEventListener('scroll', stopScroll);

window.addEventListener('load', positionSidebar);




