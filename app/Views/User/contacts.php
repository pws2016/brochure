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
                                <h4 class="mb-0">Contacts</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"></li>
                                        <li class="breadcrumb-item active">Contacts</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <?php if (session()->get('msg') !== null) { ?>
                                            <div class="alert alert-success text-center mb-4" role="alert">
                                                <?php echo  session()->get('msg');
                                                session()->remove('msg');
                                                ?>
                                            </div>
                                        <?php
                                        } ?>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="mdi mdi-plus me-2"></i> Add New </button>
                                            </div>
                                            <form action="<?= base_url('user/contacts/insert') ?>" method="post" id="form" enctype="multipart/form-data" data-parsley-validate="">
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel"> Add Contacts</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add package Form -->

                                                                <div class="form-group">
                                                                    <label for="">Name</label><span class="text-primary">*</span>
                                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Email</label><span class="text-primary">*</span>
                                                                    <input type="email" id="email" name="email" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Phone</label><span class="text-primary">*</span>
                                                                    <input type="number" id="phone" name="phone" class="form-control" size="20" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Fax</label>
                                                                    <input type="text" id="fax" name="fax" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Address</label>
                                                                    <input type="text" id="address" name="address" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image" class="form-label">Choose image</label><span class="text-primary">*</span>
                                                                    <input class="form-control" type="file" name="image" id="image" required>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Category</label><span class="text-primary">*</span>
                                                                    <select id="ids_category" name="ids_category[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ..." required style="width:100%">
                                                                        <?php if (!empty($list_category)) {
                                                                            foreach ($list_category as $k => $v) { ?>
                                                                                <option value="<?php echo $v['id'] ?>" <?php if ($v['user_id'] == null) echo 'selected' ?>><?php echo $v['title'] ?></option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" id="add">Add Contacts</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>


                                    <!-- end row -->

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>


                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Fax</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                <th>Categories</th>
                                                <th>Enable</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($cont)) {
                                                foreach ($cont as $row) {
                                            ?><tr id="tr_<?php echo $row['id']; ?>">



                                                        <td> <?php echo $row['name']; ?></td>

                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['phone']; ?></td>
                                                        <td><?php echo $row['fax']; ?></td>
                                                        <td><?php echo $row['address']; ?></td>


                                                        <td>

                                                            <img src="<?php echo base_url('uploads/contact_pic/' . $row['image']) ?>" height="50" width="50px" />
                                                        </td>
                                                        <td><?php echo $row['categories']; ?></td>
                                                        <td><?php if ($row['enable'] == 1) { ?><span class="bg-success badge me-2"><?php echo lang('app.yes') ?></span> <?php } else { ?><span class="bg-danger badge me-2"><?php echo lang('app.no') ?></span> <?php } ?></td>
                                                        <td>
                                                            <ul class="list-inline mb-0">

                                                                <li class="list-inline-item">

                                                                    <a onclick="get_data('<?php echo $row['id']; ?>')" class="px-2 text-primary" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a class="px-2 text-info" data-bs-target="#duplicate-modal-dialog" data-bs-toggle="modal" onclick="duplicate_item('<?php echo $row['id'] ?>')" href=""><i class="uil uil-file-copy-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a class="px-2 text-warning" data-bs-target="#associateBroch-modal-dialog" data-bs-toggle="modal" onclick="associate_item('<?php echo $row['id'] ?>')" href=""><i class="uil uil-apps font-size-18"></i></a>
                                                                </li>

                                                                <?php if ($row['enable'] == 1) { ?>
                                                                    <li class="list-inline-item">
                                                                        <a class="px-2 text-danger" data-bs-target="#block-modal-dialog" data-bs-toggle="modal" onclick="block_item('<?php echo $row['id'] ?>','<?php echo $row['enable'] ?>')" href=""><i class="uil uil-file-block-alt font-size-18"></i></a>
                                                                    </li>
                                                                <?php } else { ?>
                                                                    <li class="list-inline-item">
                                                                        <a class="px-2 text-success" data-bs-target="#block-modal-dialog" data-bs-toggle="modal" onclick="block_item('<?php echo $row['id'] ?>','<?php echo $row['enable'] ?>')" href=""><i class="uil uil-file-check-alt font-size-18"></i></a>
                                                                    </li>
                                                                <?php } ?>
                                                                <?php /*
                                                                    <li class="list-inline-item">
                                                                        <a onclick="del_pack('<?php echo $row['id']; ?>')" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                    </li>
																	*/ ?>

                                                        </td>

                                                    </tr>
                                            <?php }
                                            }
                                            ?>

                                        </tbody>

                                    </table>

                                    <form action="<?= base_url('user/contacts/update') ?>" method="post" id="form" enctype="multipart/form-data">
                                        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="edit_contact">
                                                        <!-- Add package Form -->

                                                    </div>

                                                    <!-- body -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="update">Update</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </form>


                                    <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform', 'method' => 'post'];
                                    echo form_open(base_url('user/contacts'), $attributes); ?>
                                    <input type="hidden" name="action" id="block_action" value="">
                                    <input type="hidden" name="id" id="block_id">
                                    <div class="modal fade" id="block-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_block_item') ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>


                                                <div class="modal-body" id="div_block_item">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_cancel') ?></button>
                                                    <input type="submit" name="delete" class="btn btn-danger" value="<?php echo lang('app.btn_save') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform', 'method' => 'post'];
                                    echo form_open(base_url('user/contacts'), $attributes); ?>
                                    <input type="hidden" name="action" value="duplicate">
                                    <input type="hidden" name="id" id="duplicate_id">
                                    <div class="modal fade" id="duplicate-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_duplicate_item') ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>


                                                <div class="modal-body" id="">
                                                    <?php echo lang('app.alert_duplicate_item') ?><br />
                                                    <div class="alert alert-warning"><label><input type='checkbox' name='insert_item' checked>I accept to associate the copied item to brochures as original</label></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_cancel') ?></button>
                                                    <input type="submit" name="delete" class="btn btn-danger" value="<?php echo lang('app.btn_save') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform', 'method' => 'post'];
                                    echo form_open(base_url('user/contacts'), $attributes); ?>
                                    <input type="hidden" name="action" value="associate">
                                    <input type="hidden" name="id" id="associate_id">
                                    <div class="modal fade" id="associateBroch-modal-dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-fullscreen">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title mt-0" id="exampleModalScrollableTitle"><?php echo lang('app.modal_associate_broch_item') ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>


                                                <div class="modal-body" id="">
                                                    <div class="alert alert-info"><?php echo lang('app.help_associate_item') ?></div>
                                                    <table class="table table-bordered" id="">
                                                        <thead>
                                                            <th></th>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Created_at</th>
                                                            <th>updated_at</th>
                                                            <th>Status</th>
                                                        </thead>
                                                        <tbody id="div_list_brochures">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_cancel') ?></button>
                                                    <input type="submit" name="delete" class="btn btn-danger" value="<?php echo lang('app.btn_save') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Optional JavaScript -->
                        <!-- JAVASCRIPT -->
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>


                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/js/select2.min.js"></script>
                        <!-- Toastr -->
                        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>





                        <script>
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


                            function get_data(id) {
                                $.ajax({
                                    url: "<?php echo base_url("user/contacts/get_data"); ?>",
                                    type: "POST",
                                    cache: false,
                                    data: {

                                        id: id


                                    },
                                    success: function(dataResult) {
                                        $("#edit_contact").html(dataResult);
                                        $(".select2").select2();

                                    }

                                });
                            }

                            function del_pack(id) {
                                if (confirm("are you sure !")) {
                                    $.ajax({
                                        url: "<?php echo base_url("user/contacts/delete"); ?>",
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

                            function block_item(id, enable) {
                                $("#div_msg_desactivate").hide(0);
                                $("#div_msg_activate").hide(0);
                                $("#block_id").val(id);
                                if (enable == 1) $("#block_action").val('desactivate');
                                else $("#block_action").val('activate');
                                $.ajax({
                                    url: "<?php echo base_url("user/contacts/get_block_data"); ?>",
                                    type: "POST",
                                    cache: false,
                                    data: {

                                        id: id,
                                        enable: enable

                                    },
                                    success: function(dataResult) {
                                        $("#div_block_item").html(dataResult);
                                    }

                                });

                            }

                            function duplicate_item(id) {
                                $("#duplicate_id").val(id);
                            }

                            function associate_item(id) {
                                $("#associate_id").val(id);
                                $.ajax({
                                    url: "<?php echo base_url("ajax/get_list_broch"); ?>",
                                    type: "POST",
                                    cache: false,
                                    data: {

                                        id: id,
                                        type_item: 'premi'

                                    },
                                    success: function(dataResult) {
                                        $("#div_list_brochures").html(dataResult);
                                    }

                                });

                            }
                        </script>

                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
</body>

</html>