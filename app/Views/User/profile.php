<!doctype html>
<html lang="it">

    <head>
        
        <meta charset="utf-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" CONTENT="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
        <meta content="Creazioneimpresa" name="author" />
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
<style>
	input[type=text]:focus,input[type=email]:focus,input[type=password]:focus,input[type=email]:focus,input[type=date]:focus,input[type=time]:focus,input[type=number]:focus,input[type=file]:focus,input[type=url]:focus,select:focus,textarea:focus {outline: #FF7700 auto 5px;}
			select.form-control:focus {outline: #FF7700 auto 5px;border: 1px solid #FF7700 ;}
		</style>
    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/headeruser.php')?>
    
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.title_page_profile')?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('app.menu_profile')?></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                     <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                       <?php //echo $validation->listErrors()
			 if(isset($validation)){?>
			 <div class="alert alert-danger" role="alert">
				 <?php echo $validation->listErrors()?>
				</div>
			 <?php }?>
			 <?php //echo $validation->listErrors()
			 if(isset($error)){?>
			 <div class="alert alert-danger" role="alert">
				 <?php echo $error?>
				</div>
			 <?php }?>
			  <?php //echo $validation->listErrors()
			 if(isset($success)){?>
			 <div class="alert alert-success" role="alert">
				 <?php echo $success?>
				</div>
			 <?php }?>

                                        <div class="row">
                                            
                                            <div class="col-lg-12 ms-lg-auto">
                                                <div class="mt-5 mt-lg-4">
                                                   
                                                    
                                                    <?php $attributes = ['class' => 'custom-validation','novalidate'=>true, 'id' => '','method'=>'post' ,  'accept-charset'=>"UTF-8"];
									echo form_open('', $attributes);?>
                                                       
                                                        <div class="row mb-4">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email <code>*</code></label>
                                                            <div class="col-sm-9">
                                                               <?php $input = [
																			'type'  => 'text',
																			'name'  => 'signup_email',
																			'id'    => 'signup_email',
																			'class' => 'form-control',
																			'value'=>$inf_user['email'],
																			//'required'=>true,
																			"disabled"=>true,
																			
																			'placeholder' =>"Email"
																	];

																	echo form_input($input);?>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">mobile <code>*</code></label>
                                                            <div class="col-sm-9">
                                                               <?php $input = [
																			'type'  => 'text',
																			'name'  => 'mobile',
																			'id'    => 'mobile',
																			'class' => 'form-control',
																			'value'=>$inf_user['mobile'],
																			'required'=>true,
																			
																			'parsley-type'=>'number',
																			'placeholder' =>"Mobile"
																	];

																	echo form_input($input);?>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-4">
                                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label"><?php echo lang('app.field_password')?></label>
                                                            <div class="col-sm-9">
                                                             <?php $input = [
												'type'  => 'password',
												'name'  => 'signup_password',
												'id'    => 'signup_password',
												'class' => 'form-control',
												
												'placeholder' =>lang('app.field_password')
										];

										echo form_input($input);?>
										<small id="passwordHelpInline" class="text-muted"> <?php echo lang('app.help_update_password_profile')?></small>
                                                            </div>
                                                        </div>
														<div class="row mb-4">
                                                            <label for="horizontal-password-input" class="col-sm-3 col-form-label"><?php echo lang('app.field_confirm_password')?></label>
                                                            <div class="col-sm-9">
                                                              <?php $input = [
												'type'  => 'password',
												'name'  => 'signup_password_confirmation',
												'id'    => 'signup_password_confirmation',
												'class' => 'form-control',
												 'data-parsley-equalto'=>'#signup_password',
												
												 
												'placeholder' =>lang('app.field_confirm_password')
										];

										echo form_input($input);?>
                                                            </div>
                                                        </div>
														
                                                        <div class="row justify-content-end">
                                                            <div class="col-sm-9">
                                                               
            
                                                                <div>
                                                                    <button type="submit" name="submit" class="btn btn-primary w-md"><?php echo  lang('app.btn_save')?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                       
                                       
                                    </div>
                                </div>
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

        <!-- apexcharts -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

          <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/dashboard.init.js"></script>

      <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
		    <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
		 <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-validation.init.js"></script>
		 <script>
		 function get_provincia(t,v){
			
			$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_provincia_by_nazione_style2",
				  method:"POST",
				  data:{id_nazione:v,t:t}
				  
			}).done(function(data){
				if(t=='residenza_stato'){
					$("#div_residenza_provincia").html(data);
					var xxx="<label for='horizontal-email-input' class='col-sm-3 col-form-label'><?php echo lang('app.field_city')?></label><div class='col-sm-9'><input type='text' name='residenza_comune' id='residenza_comune' class='form-control form-control-sm'></div>";
					$("#div_residenza_comune").html(xxx);
				}
				if(t=='fattura_stato'){
					$("#div_fattura_provincia").html(data);
					var xxx="<label for='horizontal-email-input' class='col-sm-3 col-form-label'><?php echo lang('app.field_city')?></label><div class='col-sm-9'><input type='text' name='fattura_comune' id='fattura_comune' class='form-control form-control-sm'></div>";
					$("#div_fattura_comune").html(xxx);
				}
			});
		}
		function get_comune(t,v){
		
			$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_comune_by_provincia_style2",
				  method:"POST",
				  data:{id_provincia:v,t:t}
				  
			}).done(function(data){
				
				if(t=='residenza_provincia') $("#div_residenza_comune").html(data);
				if(t=='fattura_provincia') $("#div_fattura_comune").html(data);
				
			});
		}
		</script>
    </body>
</html>
