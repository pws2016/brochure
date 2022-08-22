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
        h3.post__title.expand:before {
            width: 100px;
        }

        h3.post__title:before {
            content: "";
            width: 0;
            height: 10px;
            background-color: #FF7700;
            position: absolute;
            top: 0;
            transition: width 0.5s;
        }
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
                                <h4 class="mb-0"><?php echo lang('Company Info') ?></h4>

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

                                    <h4 class="card-title">Company Info inputs</h4>
                                    <p class="card-title-desc">Updates </p>

                                    <form action="<?= base_url('user/companyInfo/update') ?>" method="post" id="form" enctype="multipart/form-data">



                                        <div class="mb-3 row">
                                            <label for="logo" class="col-md-2 col-form-label">Choose Logo</label>

                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="logo" id="logo">
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($company['logo'] != "") { ?> <img src="<?php echo base_url('uploads/' . $company['logo']) ?>" height="50" width="50px"><?php }


                                                                                                                                    ?>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="background" class="col-md-2 col-form-label">Choose Background</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="background" id="background">
                                            </div>
                                            <div class="col-md-2">
                                                <?php
                                                if ($company['background'] != "") { ?> <img src="<?php echo base_url
                                                    ('uploads/' . $company['background']) ?>" height="50" width="50px"><?php }


                                                                                                                                    ?>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title_operation" class="col-md-2 col-form-label">title_operation</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_operation" id="title_operation" value="<?php echo $company['title_operation'] ?? '' ?>">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_operation" class="col-md-2 col-form-label">description_operation</label>
                                            <div class="col-md-10">

                                                <textarea id="operation" name="description_operation" ><?php echo $company['description_operation'] ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title_contacts" class="col-md-2 col-form-label">title_contacts</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_contacts" id="title_contacts" value="<?php echo $company['title_contacts'] ?? '' ?>">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_operation" class="col-md-2 col-form-label">description_contacts</label>
                                            <div class="col-md-10">

                                                <textarea id="contacts" name="description_contacts"><?php echo $company['description_operation'] ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title_partners" class="col-md-2 col-form-label">title_partners</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_partners" id="title_partners" value="<?php echo $company['title_partners'] ?? '' ?>">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_partners" class="col-md-2 col-form-label">description_partners</label>
                                            <div class="col-md-10">

                                                <textarea id="partners" name="description_partners"><?php echo $company['description_partners'] ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title_premi" class="col-md-2 col-form-label">title_permi</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_premi" id="p-title" value="<?php echo $company['title_premi'] ?? '' ?>">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_intro" class="col-md-2 col-form-label">description_premi</label>
                                            <div class="col-md-10">

                                                <textarea id="premi" name="description_premi"><?php echo $company['description_premi'] ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title_intro" class="col-md-2 col-form-label">title_products</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_product" id="p-title" value="<?php echo $company['title_product'] ?? '' ?>">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_intro" class="col-md-2 col-form-label">description_products</label>
                                            <div class="col-md-10">

                                                <textarea id="product" name="description_product"><?php echo $company['description_product'] ?? '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="title_intro" class="col-md-2 col-form-label">title_intro</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="title_intro" id="title_intro" value="<?php echo $company['title_intro'] ?? '' ?>">

                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description_intro" class="col-md-2 col-form-label">description_intro</label>
                                            <div class="col-md-10">

                                                <textarea id="intro" name="description_intro"><?php echo $company['description_intro'] ?? '' ?></textarea>
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary " id="update">Update</button>

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