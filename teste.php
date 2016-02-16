<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CR Tool</title>
		<link href="assets/bootstrap-3.3.6/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link href="assets/custom.css" rel="stylesheet">
		<link href="assets/dialogPolyfill.css" rel="stylesheet">
		<link href="assets/dropzone/dropzone.css" rel="stylesheet">
		<link href="assets/dropzone/basic.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row" id="header">
				<h2 class="text-center">Computed Radiography Tool</h2>
				<hr>
			</div>
			<div class="row">

			<form action="/target" class="dropzone" id="my-dropzone"></form>



			<div id="loadProgress">Image Load Progress:</div>
			<div class="row">
				<div class="col-xs-12 col-md-4 col-lg-4 ">
					<a id="hideOP"><i class="fa fa-pencil-square-o"></i></a>
					<div class="options">
						<table>
							<tr>
								<td>
									<a id="activate" class="list-group-item"><i class="fa fa-angle-right"></i></a>
								</td>
								<td>
									<a id="enableLength" class="list-group-item"><i class="fa fa-arrows-h"></i></a>
								</td>
								<td>
									<a id="pan" class="list-group-item"><i class="fa fa-arrows"></i></a>
								</td>
								<td>
									<a id="zoom" class="list-group-item"><i class="fa fa-search-plus"></i></a>
								</td>
								<td>
									<a id="defaultStrategy" class="list-group-item"><i class="fa fa-picture-o"></i></a>
								</td>
								<td>
									<a id="osirixStrategy" class="list-group-item"><i class="fa fa-picture-o"></i></a>
								</td>
								<td>
									<a id="save" class="list-group-item"><i class="fa fa-floppy-o"></i></a>
								</td>
							</table>
							<table>
								<tr>
									<td><a id="clearAngleData" class="list-group-item"><i class="fa fa-eraser"></i>   <i class="fa fa-angle-right"></i></a></td>
									<td><a id="clearLengthData" class="list-group-item"><i class="fa fa-eraser"></i>   <i class="fa fa-arrows-h"></i></a></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-xs-12 col-md-8 col-lg-8">
						<div style="width:800px;height:600px;position:relative;color: white;display:inline-block;border-style:solid;border-color:black;"
							oncontextmenu="return false"
							class='disable-selection noIbar'
							unselectable='on'
							onselectstart='return false;'
							onmousedown='return false;'>
							<div id="dicomImage"
								style="width:800px;height:600px;top:0px;left:0px; position:absolute">
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		<!-- jquery - currently a dependency and thus required for using cornerstoneWADOImageLoader -->
		<script src="assets/jquery-2.2.0.min.js"></script>
		<!-- Bootstrap -->
		<script src="assets/bootstrap-3.3.6/js/bootstrap.min.js"></script>
		<!-- include the cornerstone library -->
		<script src="assets/cornerstone/cornerstone.min.js"></script>
		<SCRIPT src="assets/cornerstone/cornerstoneMath.js"></SCRIPT>
		<SCRIPT src="assets/cornerstone/cornerstoneTools.js"></SCRIPT>
		<!-- include the dicomParser library as the WADO image loader depends on it -->
		<script src="assets/cornerstone/dicomParser.min.js"></script>
		<!-- jpeg 2000 codec -->
		<script src="assets/cornerstone/jpx.min.js"></script>
		<!-- include the cornerstoneWADOImageLoader library -->
		<script src="assets/cornerstone/cornerstoneWADOImageLoader.js"></script>
		<!-- include the Dialog library -->
		<!--script src="assets/cornerstone/dialogPolyfill.js"></script-->
		<!-- include All's function -->
		<script src="assets/cornerstone/functions.js"></script>
		<!-- Dropzone.js-->
		<script src="assets/dropzone/dropzone.js"></script>





		<script>

		$(document).ready(function() {

			var nr_images = 0;
			var current_image = 0;
			var images_array = [];
			var element = $('#dicomImage').get(0);
			cornerstone.enable(element);


			Dropzone.options.myDropzone = {
			
			  // Prevents Dropzone from uploading dropped files immediately
			  autoProcessQueue: false,
			
			  init: function() {
						
			    var myDropzone = this;
			
				//this function handle addedfile
			    this.on("addedfile", function(file) {

			    		images_array.push(file);
			    		console.log(file.name)
				  		var imageId = cornerstoneWADOImageLoader.fileManager.add(file);
        		  		loadAndViewImage(imageId);			    		
			    	
			
			    });
			
			  }
			};


		});


</script>



	</html>