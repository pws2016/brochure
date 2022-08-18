<!doctype html>
<html lang="it">
 
    <head>
        
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_create_requests')?> | <?php echo $settings['meta_title']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" CONTENT="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
		   <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
		 <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
		   <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		     <link rel="stylesheet" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.css">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <style>
	 .h5title {border-bottom: 1px solid;padding-bottom: 10px;}
input[type=text]:focus,input[type=email]:focus,input[type=password]:focus,input[type=email]:focus,input[type=date]:focus,input[type=time]:focus,input[type=number]:focus,input[type=file]:focus,input[type=url]:focus,select:focus,textarea:focus {outline: #FF7700 auto 5px;}
	 select.form-control:focus {outline: #FF7700 auto 5px;border: 1px solid #FF7700 ;}
	 .error{color:#6a74f4 !important;}
	 .parsley-errors-list>li {color:#6a74f4 !important;font-weight:bold;}
		</style>
	</head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/headeruser.php')?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.title_page_create_requests_certification')?></h4>

                                  

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
						
                          <div class="row justify-content-center">
                            <div class="col-lg-12">
                               
                                <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                      

                                        <div id="vertical-example" class="vertical-wizard">
                                            <!-- Seller Details -->
                                            <h3>General informations</h3>
                                            <section>
												<div class="alert alert-danger" role="alert" id="error_alert_0" style="display:none"><?php echo lang('app.error_required')?></div>
												
                                                <form method="post" id="form-step-0"  enctype="multipart/form-data">
													<div class="row">
														 <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input">Title<span class="text-primary">*</span>
																
																</label>
                                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $inf_brochure['title']?>" required>
                                                            </div>
                                                        </div>
													</div>
                                                    <!--/div-->
												</form>
											</section>
											 <h3>Couverture page</h3>
											<section>
											<form method="post" id="form-step-1" enctype="multipart/form-data">
											<div class="row">
														 <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input">Title couverture<span class="text-primary">*</span>
																
																</label>
                                                                <input type="text" class="form-control" id="title_couverture" name="title_couverture" value="<?php echo $inf_brochure['title_couverture']?>" required>
                                                            </div>
                                                        </div>
														
														<div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input">SubTitle couverture
																
																</label>
                                                                <input type="text" class="form-control" id="subtitle_couverture" name="subtitle_couverture" value="<?php echo $inf_brochure['subtitle_couverture']?>" >
                                                            </div>
                                                        </div>
													</div>
													
											
														<div class="form-check form-check-inline">
															  <input class="form-check-input" name="selectlogo" type="radio" id="logo1" value="no">
															  <label class="form-check-label" for="logo1">without logo</label>
														</div>
														<div class="form-check form-check-inline">
															  <input class="form-check-input" name="selectlogo" type="radio" id="logo2" value="default" checked>
															  <label class="form-check-label" for="logo2">Default logo</label>
														</div>
														<div class="form-check form-check-inline">
															  <input class="form-check-input" name="selectlogo" type="radio" id="logo4" value="current" >
															  <label class="form-check-label" for="logo2">Current logo</label>
														</div>
														<div class="form-check form-check-inline">
															  <input class="form-check-input" name="selectlogo" type="radio" id="logo3" value="new">
															  <label class="form-check-label" for="logo3">New logo</label>
														</div>
												
												<div class="row">
													<div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label for="verticalnav-firstname-input">Uplaod New Logo<span class="text-primary">*</span>
																
																</label>
                                                                <input type="file" class="form-control" id="logo" name="logo" >
                                                            </div>
                                                        </div>
												</div>
											</form>
											</section>
											 <h3>Operation Page</h3>
                                              <section>
											 	<form method="post" id="form-step-2" action="<?php echo base_url($prefix_route.'requests/pay_request')?>"  enctype="multipart/form-data">
											 		
												
												</form>
                                            </section>
											<h3>Premi Page</h3>
                                              <section>
											 	<form method="post" id="form-step-3" action="<?php echo base_url($prefix_route.'requests/pay_request')?>"  enctype="multipart/form-data">
											 		
												
												</form>
                                            </section>
											<h3>Partner Page</h3>
                                              <section>
											 	<form method="post" id="form-step-4" action="<?php echo base_url($prefix_route.'requests/pay_request')?>"  enctype="multipart/form-data">
											 		
												
												</form>
                                            </section>
											<h3>Contacts Page</h3>
                                              <section>
											 	<form method="post" id="form-step-5" action="<?php echo base_url($prefix_route.'requests/pay_request')?>"  enctype="multipart/form-data">
											 		
												
												</form>
                                            </section>
											<h3>Products Page</h3>
                                              <section>
											 	<form method="post" id="form-step-6" action="<?php echo base_url($prefix_route.'requests/pay_request')?>"  enctype="multipart/form-data">
											 		
												
												</form>
                                            </section>
											<h3>Introduction Page</h3>
                                              <section>
											 	<form method="post" id="form-step-7" action="<?php echo base_url($prefix_route.'requests/pay_request')?>"  enctype="multipart/form-data">
											 		
												
												</form>
                                            </section>
										</div>
									 </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                            </div>
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
 
		   
       
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                               <?php echo view('includes/copyright');?>
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
	
	
   <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>


		
		
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
		  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/js/select2.min.js"></script>
		  
		 
		  
<?php /*		  
   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
		*/ ?>
		 <!-- jquery step -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/tinymce/tinymce.min.js"></script>
	  
	<script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
		<script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
		
		   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
		   <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">
		 
 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

        <!-- form mask init -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-mask.init.js"></script>
		  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
		  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
		<script>
$(document).ready(function(){
	tinymce.init({
			selector:"textarea",
			 language: 'it',
			setup: function (editor) {
				editor.on('blur', function () {
					tinymce.triggerSave();
				});
			},
			height:220,
			plugins: [
    'advlist autolink lists  charmap  preview  textcolor',
    'searchreplace visualblocks code fullscreen',
    'table contextmenu paste code wordcount'
  ],
  mobile: { 
    theme: 'mobile' 
  },
  menubar:false,
  toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat ',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ],
		})});

		$("#vertical-example").steps({
			headerTag:"h3",
			bodyTag:"section",
			transitionEffect:"slide",
			stepsOrientation:"vertical",
			startIndex:<?php echo $startIndex ?? 0?>,
			labels: {
				cancel: "<?php echo lang('app.btn_cancel')?>",
				current: "<?php echo lang('app.current_step')?>:",
				pagination: "<?php echo lang('app.pagination')?>",
				finish: "<?php  echo lang('app.btn_finish'); ?>",
				next: "<?php echo lang('app.btn_next')?>",
				previous: "<?php echo lang('app.btn_prev')?>",
				loading: "<?php echo lang('app.loading')?> ..."
			},
			onStepChanging:function (event, currentIndex, newIndex) {
				$("#error_alert_"+currentIndex).hide(0);
				if(currentIndex<newIndex){
					 var $form = $('#form-step-'+currentIndex).parsley();

					if ($form.on('field:validated', function() {
					  $('.parsley-error').length === 0;
					  $("#error_alert_0").show(0);
					}).validate({
					  force: true
					})) {
						$("#error_alert").hide(0);
						
						
						
						save_step(currentIndex);
					    return true;
					}
					if($form.on('form:error')){
					  $(".parsley-errors-list").prev().addClass("error");
					  return false;
					}
					
				}
				else return true;
			},
			onFinished:function (event, currentIndex) { 
			
			} 
		});
		$("input,textarea").on("keyup",function(){
			$(this).removeClass("error");
		  });
		  $("select").on("change",function(){
			$(this).removeClass("error");
		  });
		  
		  

	
		



function save_step(currentIndex=0){
			
	$("#error_alert_"+currentIndex).hide(0);		
	var formData = new FormData();
  
	var ff=$('#form-step-'+currentIndex).serializeArray();
	
	$.each( ff, function( k, v ) {
		formData.append(v.name,v.value);
 
	});
formData.append('step',currentIndex);

if(currentIndex==1){
	 var files = document.getElementById("logo").files;
   for (var i = 0; i < files.length; i++) {
	   var file = files[i];
	   formData.append('logo', file, file.name);
	}
}
		$.ajax({
				url:"<?php echo base_url()?>/ajax/save_step",
				type: 'POST',
				processData:false,
				contentType:false,
				data: formData
			}).done(function(data){ 
			console.log(data);
		
				
			});
		
		}



 

	</script>


		
		  
		  
    </body>
</html>
