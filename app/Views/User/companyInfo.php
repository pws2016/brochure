<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <title><?php echo lang('/user/dashboarduser') ?> | <?php echo $settings[''] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Creazioneimpresa" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        h3.post__title.expand:before {width: 100px;}
        h3.post__title:before {content: "";width: 0;height: 10px;background-color: #FF7700;position: absolute;top: 0;transition: width 0.5s;}
    </style>
</head>

<!--body data-layout="horizontal" data-topbar="colored"-->

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php echo view('includes/headerUser.php') ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Profilo Società</h4>

                                <!-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('') ?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('') ?></li>
                                        </ol>
                                    </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <!--h4 class="card-title">Company Info inputs</h4-->
                                    <p class="card-title-desc">Aggiornamento il profilo aggiungendo informazioni di DEFAULT. Questo ti permetterà di velocizzare l'output della brochure.</p>

                                    <form action="<?= base_url('user/companyInfo/update') ?>" method="post" id="form" enctype="multipart/form-data">



                                        <div class="mb-3 row">
                                            <label for="logo" class="col-md-2 col-form-label">Scegli un lodo</label>

                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="logo" id="logo" >
												<small class="text-muted">Scegli un logo di default.  Questo logo sarà poi utilizzato automaticamente su tutte le brochure.  Qual ora volesse è possibile modificare il logo direttamente sulla brochure. </small>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($company['logo'] != "") { ?> <img src="<?php echo base_url('uploads/' . $company['logo']) ?>" height="50" width="50px"><?php } ?>
                                            </div>
											
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="background" class="col-md-2 col-form-label">Scegli un immagine copertina</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="background" id="background">
												<small class="text-muted">Scegli un’immagine di sfondo che verrà poi utilizzato automaticamente su tutte le brochure.  Qual ora volesse, è possibile modificarlo direttamente sulla brochure.</small>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($company['background'] != "") { ?> <img src="<?php echo base_url
                                                    ('uploads/' . $company['background']) ?>" height="50" width="50px"><?php }
                                                                             ?>
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
										<hr>
                                        <div class="mb-3 row">
                                            <label for="title_operation" class="col-md-2 col-form-label">Titolo Operazioni</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_operation" id="title_operation" value="<?php echo $company['title_operation'] ?? '' ?>">
												<small class="text-muted">Verrà impostato in automatico sulla brochure.  E' possibile modificare o cambiare il titolo direttamente nella brochure qual ora servisse.</small>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_operation" class="col-md-2 col-form-label">Testo</label>
                                            <div class="col-md-10">

                                                <textarea id="operation" name="description_operation" ><?php echo $company['description_operation'] ?? '' ?></textarea>
                                            </div>
                                        </div>
										 <div class="mb-3 row">
                                            <label for="image_operation" class="col-md-2 col-form-label">Scegli un immagine</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="image_operation" id="image_operation">
												<small class="text-muted">Scegli un’immagine di sfondo che verrà poi utilizzato automaticamente su tutte le brochure.  Qual ora volesse, è possibile modificarlo direttamente sulla brochure.</small>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($company['image_operation'] != "") { ?> <img src="<?php echo base_url
                                                    ('uploads/' . $company['image_operation']) ?>" height="50" width="50px"><?php }
                                                                             ?>
                                            </div>
                                        </div>
										<hr>
                                        <div class="mb-3 row">
                                            <label for="title_contacts" class="col-md-2 col-form-label">Titolo contatti</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_contacts" id="title_contacts" value="<?php echo $company['title_contacts'] ?? '' ?>">
												<small class="text-muted">Verrà impostato in automatico sulla brochure.  E' possibile modificare o cambiare il titolo direttamente nella brochure qual ora servisse.</small>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_operation" class="col-md-2 col-form-label">Testo</label>
                                            <div class="col-md-10">

                                                <textarea id="contacts" name="description_contacts"><?php echo $company['description_operation'] ?? '' ?></textarea>
                                            </div>
                                        </div>
										<hr>
                                        <div class="mb-3 row">
                                            <label for="title_partners" class="col-md-2 col-form-label">Titolo partners</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_partners" id="title_partners" value="<?php echo $company['title_partners'] ?? '' ?>">
												<small class="text-muted">Verrà impostato in automatico sulla brochure.  E' possibile modificare o cambiare il titolo direttamente nella brochure qual ora servisse.</small>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_partners" class="col-md-2 col-form-label">Testo</label>
                                            <div class="col-md-10">

                                                <textarea id="partners" name="description_partners"><?php echo $company['description_partners'] ?? '' ?></textarea>
                                            </div>
                                        </div>
										<hr>
                                        <div class="mb-3 row">
                                            <label for="title_premi" class="col-md-2 col-form-label">Titolo premi</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_premi" id="p-title" value="<?php echo $company['title_premi'] ?? '' ?>">
												<small class="text-muted">Verrà impostato in automatico sulla brochure.  E' possibile modificare o cambiare il titolo direttamente nella brochure qual ora servisse.</small>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_intro" class="col-md-2 col-form-label">Testo premi</label>
                                            <div class="col-md-10">

                                                <textarea id="premi" name="description_premi"><?php echo $company['description_premi'] ?? '' ?></textarea>
                                            </div>
                                        </div>
										<hr>
                                        <div class="mb-3 row">
                                            <label for="title_intro" class="col-md-2 col-form-label">Titolo produzioni</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_product" id="p-title" value="<?php echo $company['title_product'] ?? '' ?>">
												<small class="text-muted">Verrà impostato in automatico sulla brochure.  E' possibile modificare o cambiare il titolo direttamente nella brochure qual ora servisse.</small>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_intro" class="col-md-2 col-form-label">Testo</label>
                                            <div class="col-md-10">

                                                <textarea id="product" name="description_product"><?php echo $company['description_product'] ?? '' ?></textarea>
                                            </div>
                                        </div>
										
										<hr>
                                        <div class="mb-3 row">
                                            <label for="title_intro" class="col-md-2 col-form-label">Titolo introduzione</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_intro" id="title_intro" value="<?php echo $company['title_intro'] ?? '' ?>">
												<small class="text-muted">Verrà impostato in automatico sulla brochure.  E' possibile modificare o cambiare il titolo direttamente nella brochure qual ora servisse.</small>

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_intro" class="col-md-2 col-form-label">Testo</label>
                                            <div class="col-md-10">

                                                <textarea id="intro" name="description_intro"><?php echo $company['description_intro'] ?? '' ?></textarea>
                                            </div>
                                        </div>
<div class="mb-3 row">
                                            <label for="image_intro" class="col-md-2 col-form-label">Scegli un immagine</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="image_intro" id="image_intro">
												<small class="text-muted">Scegli un’immagine di sfondo che verrà poi utilizzato automaticamente su tutte le brochure.  Qual ora volesse, è possibile modificarlo direttamente sulla brochure.</small>
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($company['image_intro'] != "") { ?> <img src="<?php echo base_url
                                                    ('uploads/' . $company['image_intro']) ?>" height="50" width="50px"><?php }
                                                                             ?>
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary " id="update">Salva Modifica</button>

                                    </form>
                                </div>
                            </div> <!-- container- -->
                        </div>
                    </div>
                    <!-- End Page-content -->
                    <div class="modal fade" id="client-profile-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_client_profile') ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>


                                <div class="modal-body" id="div_client_profile">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_close') ?></button>

                                </div>
                            </div>
                        </div>
                    </div>


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
            <!-- END layout-wrapper -->



            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            <!-- JAVASCRIPT -->
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

            <!--tinymce js-->
            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/tinymce/tinymce.min.js"></script>

            <!-- init js -->
 <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
            <script>
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
                    selector: 'textarea#operation',
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






                function get_client_profile(id) {
                    $.ajax({
                        url: "<?php echo base_url() ?>/ajax/get_client_profile",
                        method: "POST",
                        data: {
                            id: id
                        }

                    }).done(function(data) {

                        $("#div_client_profile").html(data);
                    });
                }
            </script>
</body>

</html>