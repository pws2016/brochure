<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <title><?php echo lang('/user/dashboarduser') ?> | <?php echo $settings[''] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Creazioneimpresa" name="author" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
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



                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0">Sub Operations</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"></li>
                                        <li class="breadcrumb-item active">Sub Operations</li>
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
                                    <div class="row mb-2">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="mdi mdi-plus me-2"></i> Add New </button>
                                            </div>
                                            <form action="<?= base_url('user/subOperations/insert') ?>" method="post" id="form" enctype="multiope/form-data">
                                            <input type="hidden" name="id_parent" value="<?php echo $id_parent?>">
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel"> Add Operations</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add Form -->

                                                                <!-- <div class="form-group">
                                                                    <label for="">name</label><span class="text-primary">*</span>
                                                                    <input type="text" id="name" name="name" class="form-control" required>
                                                                </div> -->
                                                                <div class="form-group">
                                                                    <label for="description">Description</label><span class="text-primary">*</span>
                                                                    <textarea id="descrip" name="description" class="md-textarea form-control" rows="3 "></textarea>
                                                                </div>
                                                           

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" id="add">Add </button>

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

                                                <th>ID</th>
                                          
                                                <th>description</th>
                                                <th>enable</th>
                                         


                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($sub_op)) {
                                                foreach ($sub_op as $row) {
                                            ?><tr id="tr_<?php echo $row['id']; ?>">

                                                        <td> <?php echo $row['id']; ?></td>
                                                        <td> <?php echo $row['description']; ?></td>
                                                        <td> <?php echo $row['enable']; ?></td>
                                                      
                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a onclick="get_data('<?php echo $row['id']; ?>')" class="px-2 text-primary" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                
                                                                <li class="list-inline-item">
                                                                    <a onclick="del_pack('<?php echo $row['id']; ?>')" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="<?= base_url('user/subOperationsData/' . $row['id']) ?>"><i class="uil-bars me-2"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>

                                                    </tr>
                                            <?php }
                                            }
                                            ?>

                                        </tbody>


                                    </table>

                                    <form action="<?= base_url('user/subOperations/update') ?>" method="post" id="form" enctype="multipart/form-data">
                                    <input type="hidden" name="id_parent" value="<?php echo $id_parent?>">
                                       
                                    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit operations</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="edit_op"></div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="update">Update</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>


                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
                        <!-- Toastr -->
                        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                        <!-- Font Awesome -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/select2/js/select2.min.js"></script>
                        <!-- Toastr -->
                        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
            

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

                     <!--tinymce js-->
	<script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/tinymce/tinymce.min.js"></script>


                        <!-- parsleyjs -->
                        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/parsleyjs/parsley.min.js"></script>

                        <script>
$(document).ready(function() {
			tinymce.init({
				selector: 'textarea#descrip',
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
			});});
                            function get_data(id) {
                                $.ajax({
                                    url: "<?php echo base_url("user/subOperations/get_data"); ?>",
                                    type: "POST",
                                    cache: false,
                                    data: {

                                        id: id


                                    },
                                    success: function(dataResult) {
                                        $("#edit_op").html(dataResult);
                                      
                                        tinymce.init({
				selector: 'textarea#descrip_edit',
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
                                    }

                                });
                            }


                            function del_pack(id) {
                                if (confirm("are you sure !")) {
                                    $.ajax({
                                        url: "<?php echo base_url("user/subOperations/delete"); ?>",
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