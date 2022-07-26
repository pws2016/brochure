<!doctype html>
<html lang="it">

<head>

	<meta charset="utf-8" />
	<title><?php echo lang('/user/dashboarduser') ?> | <?php echo $settings[''] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="" name="description" />
	<meta content="Creazioneimpresa" name="author" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<link rel="shortcut icon" href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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

		h6.titleblock {
			background: #f5f6f8;
			color: #000 !important;
			font-weight: 100;
			font-size: 15px;
		}
	</style>
</head>

<body data-sidebar="dark">
	<div id="layout-wrapper">
		<?php echo view('includes/headerUser.php') ?>

		<div class="main-content">

			<div class="page-content">
				<div class="container-fluid">

					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-flex align-items-center justify-content-between">
								<h4 class="mb-0">Inserimento nuova brochure</h4>
							</div>
						</div>
						<div class="col-12">
							<p>Compila correttamento tutti campi per creare una brochure.</p>
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
												<h3>Configurazione</h3>
												<section>
													<div class="alert alert-danger" role="alert" id="error_alert_0" style="display:none"><?php echo lang('app.error_required') ?></div>

													<form method="post" id="form-step-0" enctype="multipart/form-data">
														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Aggiungi un titolo progetto<span class="text-primary">*</span>

																	</label>
																	<input type="text" class="form-control" id="title" name="title" value="<?php echo $inf_brochure['title'] ?>" required>

																	<div class="form-group">
																		<label for="">Categoria</label><span class="text-primary">*</span>

																		<select id="id_category" name="id_category" class=" form-control" required style="width:100%">
																			<option value=""><?php echo lang('app.field_select') ?></option>
																			<?php if (!empty($list_category)) {

																				foreach ($list_category as $k => $v) { ?>
																					<option value="<?php echo $v['id'] ?>" <?php if ($v['user_id'] == null) echo 'selected' ?>><?php echo $v['title'] ?></option>
																			<?php }
																			} ?>
																		</select>
																		<small class="text-muted">Puoi scegliere una categoria per brochure, se non la trovi, controlla di averla inserito nella sezione Categorie</small>


																	</div>
																</div>
																<div class="mb-3">
																	<div class="row">
																		<div class="mb-3">
																			<label for="verticalnav-firstname-input">Template</label>
																			<select class="form-control" id="template_id" name="template_id" onchange="sel_template(this.value)">
																				<option value=""><?php echo lang('app.field_select') ?></option>
																				<?php

																				if (!empty($list_template)) {
																					foreach ($list_template as $k => $v) { ?>
																						<option value="<?php echo $v['id'] ?>" <?php if ($v['id'] == $inf_brochure['template_id']) echo 'selected' ?>><?php echo $v['title'] ?></option>
																				<?php }
																				} ?>
																			</select>
																			<small class="text-muted">E' l'output della tua brochure. Sarà possibile vedere un anteprima alla fine dell'inserimento</small>
																		</div>
																	</div>
																	<div class="col-lg-12">
																		<h6 class="mb-3 titleblock">Metti in ordine le pagine della tua Brochure</h6>
																	</div>
																	<div class="row" id="template_pages">
																		<?php for ($i = 1; $i <= 7; $i++) { ?>
																			<div class="mb-3 col-12">
																				<label for="verticalnav-firstname-input"> Ordine delle pagine <?php echo $i ?></label>
																				<select class="form-control" id="id_page" name="id_page[]">
																					<option value=""><?php echo lang('app.field_select') ?></option>

																					<?php
																					if (!empty($list_pages)) {
																						foreach ($list_pages as $k => $v) { ?>
																							<option value="<?php echo $v['id'] ?>" <?php if ($v['id'] == $res_page_template[$i]) echo 'selected' ?>><?php echo $v['title'] ?></option>
																					<?php }
																					} ?>
																				</select>
																			</div>
																		<?php } ?>

																	</div>

																</div>
															</div>
														</div>
														<!--/div-->
													</form>
												</section>
												<h3>Copertina </h3>
												<section>
													<form method="post" id="form-step-1" enctype="multipart/form-data">
														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Titolo di copertina<span class="text-primary">*</span>

																	</label>
																	<input type="text" class="form-control" id="title_couverture" name="title_couverture" value="<?php echo $inf_brochure['title_couverture'] ?>" required>
																</div>
															</div>

															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Sotto titolo

																	</label>
																	<input type="text" class="form-control" id="subtitle_couverture" name="subtitle_couverture" value="<?php echo $inf_brochure['subtitle_couverture'] ?>">
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Aggiungere un logo alla brochure</h6>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="selectlogo" type="radio" id="logo1" value="no">
															<label class="form-check-label" for="logo1">Senza logo</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="selectlogo" type="radio" id="logo2" value="default" checked>
															<label class="form-check-label" for="logo2">Logo di default</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="selectlogo" type="radio" id="logo4" value="current">
															<label class="form-check-label" for="logo4">Logo attuale</label>
														</div>
														<div class="form-check form-check-inline mb-3">
															<input class="form-check-input" name="selectlogo" type="radio" id="logo3" value="new">
															<label class="form-check-label" for="logo3">Nuovo logo</label>
														</div>

														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input mb-3">Carica nuovo logo<span class="text-primary">*</span>

																	</label>
																	<input type="file" class="form-control" id="logo" name="logo">
																</div>
															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Immagine di copertina</h6>
														</div>
														<div class="mb-3">

															<div class="form-check form-check-inline ">
																<input class="form-check-input" name="selectbg" type="radio" id="bg1" value="no">
																<label class="form-check-label" for="bg1">Senza immagine</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" name="selectbg" type="radio" id="bg2" value="default" checked>
																<label class="form-check-label" for="bg2">Immagine di default</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" name="selectbg" type="radio" id="bg3" value="current">
																<label class="form-check-label" for="bg3">Immagine attuale</label>
															</div>
															<div class="form-check form-check-inline">
																<input class="form-check-input" name="selectbg" type="radio" id="bg4" value="new">
																<label class="form-check-label" for="bg4">Nuova immagine</label>
															</div>

															<div class="row">
																<div class="col-lg-12">
																	<div class="mb-3">
																		<label for="verticalnav-firstname-input">Carica nuova immagine<span class="text-primary">*</span>

																		</label>
																		<input type="file" class="form-control" id="background" name="background">
																	</div>
																</div>
															</div>
														</div>
													</form>
												</section>
												<h3>Introduzione</h3>
												<section>
													<form method="post" id="form-step-2" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input">Titole introduzione</label>
																<input type="text" class="form-control" id="title_intro" name="title_intro" value="<?php echo $company['title_intro'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_intro" class="col-md-2 col-form-label">Testo</label>
															<div class="mb-3">

																<textarea id="intro" name="description_intro"><?php echo $company['description_intro'] ?? '' ?></textarea>
															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Immagine</h6>
														</div>
														<div class="form-check form-check-inline ">
															<input class="form-check-input" name="select_img_intro" type="radio" id="bg1" value="no">
															<label class="form-check-label" for="bg1">Senza immagine</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="select_img_intro" type="radio" id="bg2" value="default" checked>
															<label class="form-check-label" for="bg2">Immagine di default</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="select_img_intro" type="radio" id="bg3" value="current">
															<label class="form-check-label" for="bg3">Immagine attuale</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="select_img_intro" type="radio" id="bg4" value="new">
															<label class="form-check-label" for="bg4">Nuova immagine</label>
														</div>

														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Carica nuova immagine<span class="text-primary">*</span>

																	</label>
																	<input type="file" class="form-control" id="image_intro" name="image_intro">
																</div>
															</div>
														</div>
													</form>
												</section>
												<h3>Area di attività</h3>
												<section>
													<form method="post" id="form-step-3" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"> Titolo </label>
																<input type="text" class="form-control" id="title_product" name="title_product" value="<?php echo $company['title_product'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">

															<label for="description_product" class="col-md-2 col-form-label">description</label>
															<div class="mb-3">

																<textarea id="product" name="description_product"><?php echo $company['description_product'] ?? '' ?></textarea>
															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Elenco di tutte le attività.</h6>
															<p>Controlla la sessione <b>Area di attività</b> per togliere o aggiungere un attività nella lista.</p>
														</div>
														<div id="div_list_products">
															<?php


															foreach ($prod as $row) {
															?>
																<input type="checkbox" name="select_product[]" value="<?= $row['id']; ?>" /> <?= $row['name']; ?> <br />
															<?php
															}


															?>
														</div>
													</form>
												</section>

												<h3>Operazioni</h3>
												<section>
													<form method="post" id="form-step-4" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="title_operation"> Operation Title Operazione</label>
																<input type="text" class="form-control" id="title_operation" name="title_operation" value="<?php echo $company['title_operation'] ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_operation" class="col-md-2 col-form-label">Testo</label>
															<div class="mb-3">

																<textarea id="opertion" name="description_operation"><?php echo $company['description_operation'] ?></textarea>
															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Immagine</h6>
														</div>
														<div class="form-check form-check-inline ">
															<input class="form-check-input" name="select_img_operation" type="radio" id="bg1" value="no">
															<label class="form-check-label" for="bg1">Senza immagine</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="select_img_operation" type="radio" id="bg2" value="default" checked>
															<label class="form-check-label" for="bg2">Immagine di default</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="select_img_operation" type="radio" id="bg3" value="current">
															<label class="form-check-label" for="bg3">Immagine attuale</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" name="select_img_operation" type="radio" id="bg4" value="new">
															<label class="form-check-label" for="bg4">Nuova immagine</label>
														</div>

														<div class="row">
															<div class="col-lg-12">
																<div class="mb-3">
																	<label for="verticalnav-firstname-input">Carica nuova immagine<span class="text-primary">*</span>

																	</label>
																	<input type="file" class="form-control" id="image_operation" name="image_operation">
																</div>
															</div>
														</div>
														<div class="mb-3 row">
															<div class="col-lg-12">
																<h6 class="mb-3 titleblock">Elenco di tutte le operazioni.</h6>
																<p>Controlla la sessione <b>Operazioni</b> per togliere o aggiungere un operazione nella lista.</p>
															</div>
															<div id="div_list_operations">

																<?php

																foreach ($ope as $row) {
																?>
																	<input type="checkbox" name="select_operations[]" value="<?= $row['id']; ?>" /> <?= $row['name']; ?> <br />
																<?php
																}


																?>

															</div>
														</div>

													</form>
												</section>
												<h3>Premi</h3>
												<section>
													<form method="post" id="form-step-5" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="verticalnav-firstname-input"> Titolo Premi </label>
																<input type="text" class="form-control" id="title_premi" name="title_premi" value="<?php echo $company['title_premi'] ?>">
															</div>
														</div>
														<div>
															<div class="mb-3 row">
																<label for="description_premi" class="col-md-2 col-form-label">Testo</label>
																<div class="mb-3">

																	<textarea id="premi" name="description_premi"><?php echo $company['description_premi'] ?></textarea>
																</div>
																<div class="col-lg-12">
																	<h6 class="mb-3 titleblock">Elenco di tutti Premi.</h6>
																	<p>Controlla la sessione <b>Premi</b> per togliere o aggiungere un premio nella lista.</p>
																</div>
																<div id=div_list_premi>

																	<?php


																	foreach ($premi as $row) {
																	?>
																		<input type="checkbox" name="select_premi[]" value="<?= $row['id']; ?>" /> <?= $row['name']; ?> <br />
																	<?php
																	}


																	?>

																</div>
															</div>

													</form>
												</section>
												<h3>Partner</h3>
												<section>
													<form method="post" id="form-step-6" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="title_partners">Titolo Partner </label>
																<input type="text" class="form-control" id="title_partners" name="title_partners" value="<?php echo $company['title_partners'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_partners" class="col-md-2 col-form-label">Testo</label>
															<div class="mb-3">

																<textarea id="partners" name="description_partners"><?php echo $company['description_partners']; ?></textarea>
															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Elenco di tutti Partner.</h6>
															<p>Controlla la sessione <b>Partner</b> per togliere o aggiungere un partner nella lista.</p>
														</div>
														<div>
															<div id=div_list_partners>


																<?php


																foreach ($par as $row) {
																?>
																	<input type="checkbox" name="select_partner[]" value="<?= $row['id']; ?>" /> <?= $row['name']; ?> <br />
																<?php
																}


																?>
															</div>
														</div>
													</form>
												</section>
												<h3>Contatti</h3>
												<section>
													<form method="post" id="form-step-7" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">
														<div class="row">
															<div class="mb-3">
																<label for="title_contacts"> Titolo </label>
																<input type="text" class="form-control" id="title_contacts" name="title_contacts" value="<?php echo $company['title_contacts'] ?? '' ?>">
															</div>
														</div>
														<div class="mb-3 row">
															<label for="description_contacts" class="col-md-2 col-form-label">Testo</label>
															<div class="mb-3 row">

																<textarea id="contacts" name="description_contacts"><?php echo $company['description_contacts'] ?? '' ?></textarea>
															</div>
														</div>

														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">Telefono</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="phone" id="phone" value="<?php echo $company['phone'] ?? '' ?>">


															</div>
														</div>
														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">Email</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="email" id="email" value="<?php echo $company['email'] ?? '' ?>">


															</div>
														</div>
														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">Siteweb</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="siteweb" id="siteweb" value="<?php echo $company['siteweb'] ?? '' ?>">


															</div>
														</div>
														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">Facebook</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="facebook" id="facebook" value="<?php echo $company['facebook'] ?? '' ?>">


															</div>
														</div>
														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">Twitter</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="twitter" id="twitter" value="<?php echo $company['twitter'] ?? '' ?>">


															</div>
														</div>
														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">LinkedIn</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="linkedin" id="linkedin" value="<?php echo $company['linkedin'] ?? '' ?>">


															</div>
														</div>
														<!-- <div class="mb-3 row">
                                            <label for="title_operation" class="col-md-2 col-form-label">Instagram</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="instagram" id="instagram" value="<?php echo $company['instagram'] ?? '' ?>">
												

                                            </div> -->
														<div class="mb-3 row">
															<label for="title_operation" class="col-md-2 col-form-label">Youtube</label>
															<div class="col-md-10">
																<input class="form-control" type="text" name="youtube" id="youtube" value="<?php echo $company['youtube'] ?? '' ?>">


															</div>
														</div>
														<div class="col-lg-12">
															<h6 class="mb-3 titleblock">Elenco di tutti Contatti.</h6>
															<p>Controlla la sessione <b>Contatti</b> per togliere o aggiungere un contatto nella lista.</p>
														</div>
														<div id="div_list_contacts">

															<?php


															foreach ($cont as $row) {
															?>
																<input type="checkbox" name="select_contact[]" value="<?= $row['id']; ?>" /> <?= $row['name']; ?> <br />
															<?php
															}


															?>
														</div>
													</form>
												</section>
												<h3>Anteprima in HTML</h3>
												<section>
													<form method="post" id="form-step-8" action="<?php echo base_url($prefix_route . 'requests/pay_request') ?>" enctype="multipart/form-data">

														<div class="row">
															<input onclick="save_template()" type="button" class="btn btn-info" name="preview" value="Vedi">
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
	<!-- Responsive examples -->
	<!-- Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

	<!-- Responsive examples -->
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

	<script>
		$("#datatable").DataTable({
			language: {
				url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json'
			},
			searching: true

		});
		$(".select2").select2();
	</script>

	<script>
		$(document).ready(function() {
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

						switch (newIndex) {
							/*case 3:

								var id_cat = $("#id_category").val();
								$.ajax({
									url: "<?php echo base_url() ?>/ajax/get_items_by_cat",
									type: 'POST',

									data: {
										id_cat: id_cat,
										type_item: 'products'
									}
								}).done(function(data) {

									$("#div_list_products").html(data);

								});
								break; */
							case 4:

								var id_cat = $("#id_category").val();
								$.ajax({
									url: "<?php echo base_url() ?>/ajax/get_items_by_cat",
									type: 'POST',

									data: {
										id_cat: id_cat,
										type_item: 'operations'
									}
								}).done(function(data) {

									$("#div_list_operations").html(data);

								});
								break;
							case 5:
								var id_cat = $("#id_category").val();
								$.ajax({
									url: "<?php echo base_url() ?>/ajax/get_items_by_cat",
									type: 'POST',

									data: {
										id_cat: id_cat,
										type_item: 'premi'
									}
								}).done(function(data) {

									$("#div_list_premi").html(data);

								});
								break;
							case 6:
								var id_cat = $("#id_category").val();
								$.ajax({
									url: "<?php echo base_url() ?>/ajax/get_items_by_cat",
									type: 'POST',

									data: {
										id_cat: id_cat,
										type_item: 'partners'
									}
								}).done(function(data) {

									$("#div_list_partners").html(data);

								});
								break;
					/*		case 7:
								var id_cat = $("#id_category").val();
								$.ajax({
									url: "<?php echo base_url() ?>/ajax/get_items_by_cat",
									type: 'POST',

									data: {
										id_cat: id_cat,
										type_item: 'contacts'
									}
								}).done(function(data) {

									$("#div_list_contacts").html(data);

								});
								break; */
						}

						return true;
					}
					if ($form.on('form:error')) {
						$(".parsley-errors-list").prev().addClass("error");
						return false;
					}

				} else return true;
			},

			onFinished: function(event, currentIndex) {
				if (confirm("Are u sure !")) {

					save_step(currentIndex);
					document.location.href = "<?php echo base_url('user/brochures') ?>";
				}



			}
		});
		$("input,textarea").on("keyup", function() {
			$(this).removeClass("error");
		});
		$("select").on("change", function() {
			$(this).removeClass("error");
		});








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
			if (currentIndex == 2) {
				var files = document.getElementById("image_intro").files;
				for (var i = 0; i < files.length; i++) {
					var file = files[i];
					formData.append('image_intro', file, file.name);
				}
			}
			if (currentIndex == 4) {
				var files = document.getElementById("image_operation").files;
				for (var i = 0; i < files.length; i++) {
					var file = files[i];
					formData.append('image_operation', file, file.name);
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

		function save_template() {
			var currentIndex = 8;
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
				window.open("<?php echo base_url('user/brochures/preview/' . $inf_brochure['id']) ?>", '_blank');

			});
		}

		function sel_template(v) {
			$.ajax({
				url: "<?php echo base_url() ?>/ajax/get_template_pages",
				type: 'POST',

				data: {
					template_id: v
				}
			}).done(function(data) {
				console.log(data);
				$("#template_pages").html(data);

			});
		}
	</script>





</body>

</html>