<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <title><?php echo lang('Package') ?> | <?php echo $settings['meta_title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Creazioneimpresa" name="author" />
    <link rel="shortcut icon" href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
		  <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
        <?php echo view('includes/header.php') ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0"><?php echo lang('package ') ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('List package') ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo lang('Add package') ?></li>
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
                                                    <i class="mdi mdi-plus me-2"></i> Add package </button>
                                            </div>
                                            <form action="<?= base_url('admin/package/insert') ?>" method="post" id="form">
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel"> Add Package</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add package Form -->

                                                                <div class="form-group">
                                                                    <label for="">Title<span class="text-primary">*</span></label>
                                                                    <input type="text" id="title" name="title" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Price<span class="text-primary">*</span></label>
                                                                    <input type="text" id="price" name="price" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Description<span class="text-primary">*</span></label>
                                                                    <input type="text" id="description" name="description" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Sorting<span class="text-primary">*</span></label>
                                                                    <input type="text" id="sorting" name="sorting" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">nomber des brochures<span class="text-primary">*</span></label>
                                                                    <input type="text" id="nb_brochure" name="nb_brochure" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">validity_months<span class="text-primary">*</span></label>
                                                                    <input type="text" id="validity" name="validity_months" class="form-control" required>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" id="add">Add Package</button>
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
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Sorting</th>
                                                <th>Description</th>
                                                <th>brochures</th>
                                                <th>validity_months</th>
												<th></th>
                                            </tr>
                                            </thead>
											<tbody>
                                            <?php
                                            if (!empty($list_pack)) {
                                                foreach ($list_pack as $row) {

                                            ?><tr id="tr_<?php echo $row['id']; ?>">
                                                        <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['title']; ?></td>
                                                        <td><?php echo $row['price']; ?></td>
                                                        <td><?php echo $row['sorting']; ?></td>
                                                        <td><?php echo $row['description']; ?></td>
                                                        <td><?php echo $row['nb_brochure']; ?></td>
                                                        <td><?php echo $row['validity_months']; ?></td>


                                                        

                                                        <td>
                                                            <ul class="list-inline mb-0">




                                                                <li class="list-inline-item">


                                                                    <a onclick="get_data('<?php echo $row['id']; ?>')" class="px-2 text-primary" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
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

                                    <form action="<?= base_url('admin/package/update') ?>" method="post" id="form">
                                        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="edit_pack">
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
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- footer -->

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

    <!-- Optional JavaScript -->
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
     <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		
          <!-- Responsive examples -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
      
<script>
$("#datatable").DataTable({
		language: {
				url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json'
			},
			searching: true
			
			});

</script>



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
                url: "<?php echo base_url("admin/package/get_data"); ?>",
                type: "POST",
                cache: false,
                data: {

                    id: id


                },
                success: function(dataResult) {
                    $("#edit_pack").html(dataResult);

                }

            });
        }





        function del_pack(id) {
            if (confirm("are you sure !")) {
                $.ajax({
                    url: "<?php echo base_url("admin/package/delete"); ?>",
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
	  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
</body>

</html>