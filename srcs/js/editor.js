var video = document.querySelector("#video-element");
var refreshButton = document.getElementById('refresh-button');
var takePhotoButton = document.getElementById('take-photo-button');
var saveForm = document.getElementById('save-form');
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
var filters = [];
var uploadButton = document.querySelector('#upload-icon');
var imageLoader = document.getElementById('image-loader');
var canvas = document.querySelector('#canvas');
var canvas2 = document.querySelector('#preview-canvas');
var context = canvas.getContext('2d');
var w, h, ratio;

if (navigator.mediaDevices.getUserMedia) {
	navigator.mediaDevices.getUserMedia({ video: { width: 600, height: 400 } })
		.then(function (stream) {
			video.srcObject = stream;
		})
		.catch(function (err0r) {
			console.log("Could not stream video");
		});
}

imageLoader.addEventListener('change', uploadImage, false);

video.addEventListener('loadedmetadata', function() {
	ratio = video.videoWidth / video.videoHeight;
	w = video.videoWidth;
	h = parseInt(w / ratio, 10);
	canvas.width = w;
	canvas.height = h;
	for (i = 0; i < checkboxes.length; i++)
		checkboxes[i].disabled = false;
}, false );

function showPreview() {
	var context2 = canvas2.getContext('2d');
	canvas2.width = canvas.width;
	canvas2.height = canvas.height;
	context2.drawImage(canvas, 0, 0);
	canvas2.style.display = "block";

	refreshButton.style.display = "block";
	saveForm.style.display = "block";
	takePhotoButton.style.display = "none";
}

function uploadImage(event) {
	var reader = new FileReader();
	reader.onload = function(e) {
		var img = new Image();
		img.onload = function() {
			console.log('width:', img.width, 'height:', img.height);
			var hRatio = canvas.width / img.width;
			var vRatio = canvas.height / img.height;
			var ratio  = Math.min(hRatio, vRatio);

			context.fillStyle = "white";
			context.fillRect(0, 0, canvas.width, canvas.height);
			context.drawImage(img, (canvas.width-img.width*ratio) / 2,
				(canvas.height-img.height*ratio) / 2, img.width*ratio, img.height*ratio);
			showPreview();
		}
		img.src = e.target.result;
	}
	reader.readAsDataURL(event.target.files[0]);
}

function snap() {
	context.fillRect(0, 0, w, h);
	context.drawImage(video, 0, 0, w, h);

	showPreview();
}

function save() {
	document.getElementById('image-data').value = canvas.toDataURL('image/png');
	document.getElementById('filters').value = filters.toString();
	document.forms["save-form"].submit();
}

function refresh() {
	refreshButton.style.display = "none";
	saveForm.style.display = "none";
	takePhotoButton.style.display = "block";
	canvas2.style.display = "none";
}

function toggleFilter(values) {
	function removeFilter() {
		filters = filters.filter(f => f != values.id);
	}

	var filterId= values.id + '-filter';
	var filter = document.getElementById(filterId);

	if (filter.style.display === "block") {
		filter.style.display = "none";
		removeFilter();

		if (filters.length === 0)
			takePhotoButton.disabled = true;

	} else {
		filter.style.display = "block";
		filters.push(values.id);
		takePhotoButton.disabled = false;
	}
}
