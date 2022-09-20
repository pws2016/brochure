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
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <style>
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
    </style>
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <?php echo view('includes/headeruser.php') ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"></a></li>
                                        <li class="breadcrumb-item active"></li>
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


                                    <div class="row">

                                        <div class="col-lg-12 ms-lg-auto">
                                            <div class="mt-5 mt-lg-4">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="mdi mdi-plus me-2"></i> Nuovo phone </button>
                                                    </div>
                                                    <form action="<?= base_url('user/list_mobile/insert') ?>" method="post" id="form" enctype="multipart/form-data">
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">

                                                                        <h5 class="modal-title" id="exampleModalLabel"> Add Nuovo phone</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Add package Form -->

                                                                        <div class="form-group">
                                                                            <label for="">Nuovo phone</label><span class="text-primary">*</span>
                                                                            <input type="mobile" id="mobile" name="mobile" class="form-control" required>
                                                                        </div>

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                                                            <button type="submit" class="btn btn-primary" id="add">Salva</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="row mb-4">
                                                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">mobile <code>*</code></label>
                                                        <div class="col-sm-9">
                                                            <?php $input = [
                                                                'type'  => 'mobile',
                                                                'name'  => 'signup_email',
                                                                'id'    => 'signup_email',
                                                                'class' => 'form-control',
                                                                'value' => $inf_user['mobile'],

                                                                "disabled" => true,
                                                                'parsley-type' => 'number',
                                                                'placeholder' => "Mobile"
                                                            ];

                                                            echo form_input($input); ?>
                                                        </div>
                                                    </div>


                                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>

                                                                <th>ID</th>
                                                                <th>mobile</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            if (!empty($list_mobile)) {
                                                                foreach ($list_mobile as $row) {
                                                            ?><tr id="tr_<?php echo $row['id']; ?>">

                                                                        <td> <?php echo $row['id']; ?></td>

                                                                        <td> <?php echo $row['mobile']; ?></td>


                                                                        <td>
                                                                            <ul class="list-inline mb-0">





                                                                                <li class="list-inline-item">
                                                                                    <a onclick="del_pack('<?php echo $row['id']; ?>')" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                                </li>

                                                                            </ul>
                                                                        </td>

                                                                    </tr>
                                                            <?php }
                                                            }
                                                            ?>

                                                        </tbody>


                                                    </table>


                                                </div>


                                            </div>




                                            <!-- end main content-->

                                            <!-- JAVASCRIPT -->
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

                                            <!-- apexcharts -->
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/apexcharts/apexcharts.min.js"></script>

                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/pages/dashboard.init.js"></script>

                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/i18n/it.js"></script>
                                            <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/pages/form-validation.init.js"></script>
                                            <script>
                                                function del_pack(id) {
                                                    if (confirm("are you sure !")) {
                                                        $.ajax({
                                                            url: "<?php echo base_url("user/list_mobile/delete"); ?>",
                                                            type: "GET",
                                                            cache: false,
                                                            data: {

                                                                id: id


                                                            },
                                                            success: function(datadelete) {

                                                                $("#tr_" + id).remove();

                                                            }

                                                        });
                                                    }
                                                }
                                            </script>
</body>

</html>