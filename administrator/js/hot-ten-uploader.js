if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	ajax=new XMLHttpRequest();
} else {  // code for IE6, IE5
	ajax=new ActiveXObject("Microsoft.XMLHTTP");
} 

function _(el){
	return document.getElementById(el);
}

$("#feedback").hide();

function message(x){
	$("#progressMB").html(x);
	$("#my_canvas").css("display","none");
	$("#uploadBtn").css("display","inline-block");
	$("#retry").css("display","inline-block");
	$("#cancelBtn").css("display","none");
}

function uploadFile(){
	$("#upload_area").css("display","none");
	$('#feedback').animate({ScrollTop: 0}, 'fast');
	$("#feedback").fadeIn('slow');
	$("#uploadBtn").css("display","none");
	$("#cancelBtn").css("display","inline-block");
	$("#my_canvas").css("display","inline-block");
	var file = _( "file" ).files[0];
	var poster = _("poster").files[0];

	var filetype = file.type;

	if(!(filetype=='video/mp4'||filetype=='video/ogg'||filetype=='video/webm')){
		return message("Video Format Not Supported<br>Please Try ( MP4, WEBM, OGG)");
	}

	if(file.size>(160*1024*1024)){
		return message("File Too Large: 300MB Max Size Allowed");
	}

	var formdata = new FormData();
	
	formdata.append( "file" , file);
	formdata.append( "poster" , poster);
	formdata.append("title",$("#title").val());
	formdata.append("producer",$("#producer").val());
	formdata.append("genre",$("#genre").val());
	formdata.append("description",$("#description").val());

	ajax.upload.addEventListener( "progress" , progressHandler, false); 
	ajax.addEventListener( "load" , completeHandler, false); 
	ajax.addEventListener( "error" , errorHandler, false); 
	ajax.addEventListener( "abort" , abortHandler, false); 
	ajax.open( "POST" , "connections/parsers/hot_ten_uploader.php" ); 
	ajax.send(formdata); 
} 

function progressHandler(event){ 
	var percent = Math.round((event.loaded / event.total) * 100);
	var loadedMB = Math.round(event.loaded / 1024 /1024);
	var totalMB = Math.round(event.total / 1024 /1024);
	_("progressMB").innerHTML=loadedMB + "MB / " + totalMB + "MB";

	var ctx = _('my_canvas').getContext('2d');
	var start = 4.72;
	var cw = ctx.canvas.width;
	var ch = ctx.canvas.height;

	diff = ((percent/100)*Math.PI*2*20).toFixed(2);
	ctx.clearRect(0, 0, cw, ch);
	ctx.lineWidth = 20;
	ctx.fillStyle = '#006699';
	ctx.strokeStyle = '#006699';
	ctx.textAlign = 'center';
	ctx.font="20px Comic Sans MS";
	ctx.fillText(percent + '%', cw*.5,ch*.5+4,cw);
	ctx.beginPath();
	ctx.arc(75,75,60,start,diff/20+start,false);
	ctx.stroke();

	if (loadedMB==totalMB) {
		_( "progressMB" ).innerHTML = "Finalizing...";
	}		
} 

function completeHandler(event){ 
	$("#file").val("");
	$("#uploadBtn").attr("disabled","true");
	$("#uploadBtn").css("display","inline-block");
	$("#cancelBtn").css("display","none");
	$("#progressMB").hide();
	_( "progressMB" ).innerHTML = "Video Upload Completed Successfully";
	$("#progressMB").fadeIn('slow');
	$("#after_links").html("<a href='hot-ten-watch.php?id="+event.target.responseText+"' class='btn btn-success'>View Video</a><br><br><a href='hot_ten_upload.php' class='btn btn-primary'>Upload Another</a>");
	$("#after_links").fadeIn('slow');
} 

function errorHandler(event){ 
	$("#uploadBtn").css("display","inline-block");
	$("#cancelBtn").css("display","none");
	_( "progressMB" ).innerHTML = "Upload Failed" ; 
} 

function abortHandler(event){ 
	$("#uploadBtn").css("display","inline-block");
	$("#cancelBtn").css("display","none");
	$("#my_canvas").css("display","none");
	$("#retry").css("display","inline-block");
	_( "progressMB" ).innerHTML = "Upload Aborted" ; 
}

function cancelUpload(){
	ajax.abort();
}

function changed(){
	if ($("#file").val()!='') {
		$("#uploadBtn").removeAttr("disabled");
	}
	var file = document.getElementById("file").files[0];
	var x = file.name;
	title = x.substr(0,x.lastIndexOf('.'));
	$("#title").val(title);
}
function retryUpload(){
	location.reload();
}