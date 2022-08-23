<!doctype html>
<html lang="it">

<head>

	<meta charset="utf-8" />
	<title><?php echo lang('app.title_page_create_requests') ?> | <?php echo $settings['meta_title'] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" CONTENT="noindex, nofollow">
	<meta name="googlebot" content="noindex, nofollow">
	<link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.css">
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<style>
		.h5title {
			border-bottom: 1px solid;
			padding-bottom: 10px;
		}

		input[type=text]:focus,
		input[type=email]:focus,
		input[type=password]:focus,
		input[type=email]:focus,
		input[type=date]:focus,
		input[type=time]:focus,
		input[type=number]:focus,
		input[type=file]:focus,
		input[type=url]:focus,
		select:focus,
		textarea:focus {
			outline: #FF7700 auto 5px;
		}

		select.form-control:focus {
			outline: #FF7700 auto 5px;
			border: 1px solid #FF7700;
		}

		.error {
			color: #6a74f4 !important;
		}

		.parsley-errors-list>li {
			color: #6a74f4 !important;
			font-weight: bold;
		}
	</style>
</head>

<body data-sidebar="dark">
	<div id="layout-wrapper">
		<?php echo view('includes/headeruser.php') ?>

		<div class="main-content">

			<div class="page-content">
				<div class="container-fluid">

					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-flex align-items-center justify-content-between">
								<h4 class="mb-0"><?php echo lang('app.title_page_create_requests_certification') ?></h4>



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
													<div class="alert alert-danger" role="alert" id="error_alert_0" style="display:none"><?php echo lang('app.error_required') ?></div>

													<form method="post" id="form-step-0" enctype="multipart/form-data">
														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Title<span class="text-primary">*</span>

																	</label>
																	<input type="text" class="form-control" id="title" name="title" value="<?php echo $inf_brochure['title'] ?>" required>
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
																	<input type="text" class="form-control" id="title_couverture" name="title_couverture" value="<?php echo $inf_brochure['title_couverture'] ?>" required>
																</div>
															</div>

															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">SubTitle couverture

																	</label>
																	<input type="text" class="form-control" id="subtitle_couverture" name="subtitle_couverture" value="<?php echo $inf_brochure['subtitle_couverture'] ?>">
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
															<input class="form-check-input" name="selectlogo" type="radio" id="logo4" value="current">
															<label class="form-check-label" for="logo4">Current logo</label>
														</div>
														<div class="form-check form-check-inline mb-3">
															<input class="form-check-input" name="selectlogo" type="radio" id="logo3" value="new">
															<label class="form-check-label" for="logo3">New logo</label>
														</div>

														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input mb-3">Uplaod New Logo<span class="text-primary">*</span>

																	</label>
																	<input type="file" class="form-control" id="logo" name="logo">
																</div>
															</div>
														</div>
														<div class="mb-3">

															<div class="form-check form-check-inline ">
															<input class="form-check-input" name="selectbg" type="radio" id="bg1" value="no">
															<label class="form-check-label" for="bg1">without background</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="selectbg" type="radio" id="bg2" value="default" checked>
															<label class="form-check-label" for="bg2">Default background</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="selectbg" type="radio" id="bg3" value="current">
															<label class="form-check-label" for="bg3">Current background</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="selectbg" type="radio" id="bg4" value="new">
															<label class="form-check-label" for="bg4">New background</label>
														</div>

														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Uplaod New background<span class="text-primary">*</span>

																	</label>
																	<input type="file" class="form-control" id="background" name="background">
																</div>
															</div>
														</div>
														</div>
													</form>
												</section>
												<h3>Operation Page</h3>
												<section>
													<form method="post" id="form-step-2" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="title_operation"> Operation Title </label>
																<input type="text" class="form-control" id="title_operation" name="title_operation" value="<?php echo $inf_brochure['title_operation'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_operation" class="col-md-2 col-form-label">description</label>
															<div class="mb-3 row">

																<textarea id="opertion" name="description_operation"><?php echo $inf_brochure['description_operation'] ?></textarea>
															</div>
														</div>

													</form>
												</section>
												<h3>Premi Page</h3>
												<section>
													<form method="post" id="form-step-3" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"> Premi Title </label>
																<input type="text" class="form-control" id="title_premi" name="title_premi" value="<?php echo $inf_brochure['title_premi'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_premi" class="col-md-2 col-form-label">description</label>
															<div class="mb-3 row">

																<textarea id="premi" name="description_premi"><?php echo $inf_brochure['description_premi'] ?? '' ?></textarea>
															</div>
															<div>

																<?php


																foreach ($premi as $row) {
																?>
																	<input type="checkbox" name="select_premi[]" value="<?= $row['id']; ?> "<?php if(in_array($row['id'],$items_premi ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
																<?php
																}


																?>

															</div>

													</form>
												</section>
												<h3>Partner Page</h3>
												<section>
													<form method="post" id="form-step-4" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="title_partners"> Partners Title </label>
																<input type="text" class="form-control" id="title_partners" name="title_partners" value="<?php echo $inf_brochure['title_partners'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_partners" class="col-md-2 col-form-label">description</label>
															<div class="mb-3 row">

																<textarea id="partners" name="description_partners"><?php echo $inf_brochure['description_partners'] ?? '' ?></textarea>
															</div>
														</div>
														<?php


														foreach ($par as $row) {
														?>
															<input type="checkbox" name="select_partner[]" value="<?= $row['id']; ?>" <?php if(in_array($row['id'],$items_partner ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
														<?php
														}


														?>
													</form>
												</section>
												<h3>Contacts Page</h3>
												<section>
													<form method="post" id="form-step-5" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="title_contacts"> Contacts Title </label>
																<input type="text" class="form-control" id="title_contacts" name="title_contacts" value="<?php echo $inf_brochure['title_contacts'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_contacts" class="col-md-2 col-form-label">description</label>
															<div class="mb-3 row">

																<textarea id="contacts" name="description_contacts"><?php echo $inf_brochure['description_contacts'] ?? '' ?></textarea>
															</div>
														</div>
														<?php


														foreach ($cont as $row) {
														?>
															<input type="checkbox" name="select_contact[]" value="<?= $row['id']; ?>"  <?php if(in_array($row['id'],$items_contact ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
														<?php
														}


														?>
													</form>
												</section>
												<h3>Products Page</h3>
												<section>
													<form method="post" id="form-step-6" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"> Products Title </label>
																<input type="text" class="form-control" id="title_product" name="title_product" value="<?php echo $inf_brochure['title_product'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">

															<label for="description_product" class="col-md-2 col-form-label">description</label>
															<div class="mb-3 row">

																<textarea id="product" name="description_product"><?php echo $inf_brochure['description_product'] ?? '' ?></textarea>
															</div>
														</div>
														<?php


														foreach ($prod as $row) {
														?>

															<input type="checkbox"  name="select_product[]" value="<?= $row['id']; ?>" <?php if(in_array($row['id'],$items_product ?? array())) echo 'checked'?>/> <?= $row['name']; ?> <br />
														<?php
														}


														?>
													</form>
												</section>
												<h3>Introduction Page</h3>
												<section>
													<form method="post" id="form-step-7" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"> Intro Title </label>
																<input type="text" class="form-control" id="title_intro" name="title_intro" value="<?php echo $inf_brochure['title_intro'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_intro" class="col-md-2 col-form-label">description</label>
															<div class="mb-3 row">

																<textarea id="intro" name="description_intro"><?php echo $inf_brochure['description_intro'] ?? '' ?></textarea>
															</div>
														</div>

													</form>
												</section>
												<h3>prevus Page</h3>
												<section>
													<form method="post" id="form-step-8" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
													<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"> Template </label>
																<select class="form-control" id="template_id" name="template_id" onchange="sel_template(this.value)">
																	<option value=""><?php echo lang('app.field_select')?></option>
																	<?php foreach($list_template as $k=>$v){?>
																	<option value="<?php echo $v['id']?>" <?php if($v['id']==$inf_brochure['template_id']) echo 'selected'?>><?php echo $v['title']?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="row" id="template_pages">
													<?php	for($i=1;$i<=7;$i++){?>
														<div class="mb-3 col-12">
															<label for="verticalnav-firstname-input"> Template Page <?php echo $i?></label>
															<select class="form-control" id="id_page" name="id_page[]">
																<option value=""><?php echo lang('app.field_select')?></option>
																<?php foreach($list_pages as $k=>$v){?>
																	<option value="<?php echo $v['id']?>" <?php if($v['id']==$res_page_template[$i])echo 'selected'?>><?php echo $v['title']?></option>
																<?php }?>
															</select>
														</div>
														<?php }?>
														
														</div>
														<div class="row">
															<input onclick="save_template()" type="button" class="btn btn-info" name="preview" value="save & preview">
														</div>
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
							<?php echo view('includes/copyright'); ?>
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
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>




	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/js/select2.min.js"></script>



	<?php /*		  
   <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/@chenfengyuan/datepicker/datepicker.min.js"></script>
		*/ ?>
	<!-- jquery step -->
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/tinymce/tinymce.min.js"></script>

	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>

	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">

	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js"></script>

	<!-- form mask init -->
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-mask.init.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--tinymce js-->
<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/tinymce/tinymce.min.js"></script>

<!-- init js -->
<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
	<script>
		
		 tinymce.init({
                    selector: 'textarea#opertion',
                    height: 150,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
				tinymce.init({
                    selector: 'textarea#premi',
                    height: 150,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
				tinymce.init({
                    selector: 'textarea#partners',
                    height: 150,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
				tinymce.init({
                    selector: 'textarea#contacts',
                    height: 150,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
				tinymce.init({
                    selector: 'textarea#product',
                    height: 150,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
				tinymce.init({
                    selector: 'textarea#intro',
                    height: 150,
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                });
	

		$("#vertical-example").steps({
			headerTag: "h3",
			bodyTag: "section",
			transitionEffect: "slide",
			stepsOrientation: "vertical",
			startIndex: <?php echo $startIndex ?? 0 ?>,
			labels: {
				cancel: "<?php echo lang('app.btn_cancel') ?>",
				current: "<?php echo lang('app.current_step') ?>:",
				pagination: "<?php echo lang('app.pagination') ?>",
				finish: "<?php echo lang('app.btn_finish'); ?>",
				next: "<?php echo lang('app.btn_next') ?>",
				previous: "<?php echo lang('app.btn_prev') ?>",
				loading: "<?php echo lang('app.loading') ?> ..."
			},
			onStepChanging: function(event, currentIndex, newIndex) {
				$("#error_alert_" + currentIndex).hide(0);
				if (currentIndex < newIndex) {
					var $form = $('#form-step-' + currentIndex).parsley();

					if ($form.on('field:validated', function() {
							$('.parsley-error').length === 0;
							$("#error_alert_0").show(0);
						}).validate({
							force: true
						})) {
						$("#error_alert").hide(0);

                        tinyMCE.triggerSave();

						save_step(currentIndex);
						return true;
					}
					if ($form.on('form:error')) {
						$(".parsley-errors-list").prev().addClass("error");
						return false;
					}

				} else return true;
			},
			onFinished: function(event, currentIndex) {
				var formData = new FormData();

				var ff = $('#form-step-' + currentIndex).serializeArray();

				$.each(ff, function(k, v) {
					formData.append(v.name, v.value);

				});
				$.ajax({
							url: "<?php echo base_url() ?>/ajax/save_template",
							type: 'POST',
							processData: false,
							contentType: false,
							data: formData
						}).done(function(data) {
							console.log(data);


						});
			}
		});
		$("input,textarea").on("keyup", function() {
			$(this).removeClass("error");
		});
		$("select").on("change", function() {
			$(this).removeClass("error");
		});


function save_template(){
	var currentIndex=8;
	var formData = new FormData();

			var ff = $('#form-step-' + currentIndex).serializeArray();

			$.each(ff, function(k, v) {
				formData.append(v.name, v.value);

			});
	$.ajax({
				url: "<?php echo base_url() ?>/ajax/save_template",
				type: 'POST',
				processData: false,
				contentType: false,
				data: formData
			}).done(function(data) {
				console.log(data);
				window.open("<?php echo base_url('user/brochures/preview/'.$inf_brochure['id'])?>", '_blank'); 

			});
}

function sel_template(v){
	$.ajax({
				url: "<?php echo base_url() ?>/ajax/get_template_pages",
				type: 'POST',
				
				data: {template_id:v}
			}).done(function(data) {
				console.log(data);
				$("#template_pages").html(data);

			});
}



		function save_step(currentIndex = 0) {

			$("#error_alert_" + currentIndex).hide(0);
			var formData = new FormData();

			var ff = $('#form-step-' + currentIndex).serializeArray();

			$.each(ff, function(k, v) {
				formData.append(v.name, v.value);

			});
			formData.append('step', currentIndex);

			if (currentIndex == 1) {
				var files = document.getElementById("logo").files;
				for (var i = 0; i < files.length; i++) {
					var file = files[i];
					formData.append('logo', file, file.name);
				}
				var files = document.getElementById("background").files;
				for (var i = 0; i < files.length; i++) {
					var file = files[i];
					formData.append('background', file, file.name);
				}
			}
			$.ajax({
				url: "<?php echo base_url() ?>/ajax/save_step",
				type: 'POST',
				processData: false,
				contentType: false,
				data: formData
			}).done(function(data) {
				console.log(data);


			});

		}
	</script>





</body>

</html>