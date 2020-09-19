var mainContainer = document.querySelector('.main-container');

document.addEventListener("DOMContentLoaded", function(event) { 
	var scrollpos = localStorage.getItem('scrollpos');
	if (scrollpos)
		mainContainer.scrollTop = scrollpos;
});

window.onbeforeunload = function(e) {
	localStorage.setItem('scrollpos', mainContainer.scrollTop);
};