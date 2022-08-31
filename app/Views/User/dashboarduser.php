<!doctype html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <title><?php echo lang('/user/dashboarduser')?> | <?php echo $settings['']?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
		<style>
			h3.post__title.expand:before {width: 100px;}
			h3.post__title:before {content: "";width: 0;height: 10px;background-color: #FF7700;position: absolute;top: 0;transition: width 0.5s;}
		</style>
    </head>

    <!--body data-layout="horizontal" data-topbar="colored"-->
	<body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/headerUser.php')?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('/user/dashboarduser')?></h4>

                                    <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('')?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('/user/dashboarduser')?></li>
                                        </ol>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                     <div class="row">
					
                        </div>
                           <div class="row">
                            <div class="col-12">
                                <div class="card">
								
                                
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
 <div class="modal fade" id="client-profile-modal-dialog"  tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						
						 <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_client_profile')?></h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                        </button>
					</div>
					
		
					<div class="modal-body" id="div_client_profile">
						
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close')?></button>
						
					</div>
				</div>
			</div>
		</div>
		  
                
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
        <!-- END layout-wrapper -->

      

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

      


      <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
<script>
function get_client_profile(id){ 
	$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_client_profile",
				  method:"POST",
				  data:{id:id}
				  
			}).done(function(data){
			
				$("#div_client_profile").html(data);
			});
}
	</script>
    </body>
</html>
