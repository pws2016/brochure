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
                                <h4 class="mb-0"><?php echo lang('Clients ') ?></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('List Clients') ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo lang('Add clients') ?></li>
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
                                                    <i class="mdi mdi-plus me-2"></i> Add users </button>
                                            </div>
                                            <form action="<?= base_url('admin/user/addUser') ?>" method="post" id="form">
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h5 class="modal-title" id="exampleModalLabel"> Add user</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Add package Form -->

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="email">Email<span class="text-primary">*</span></label>
                                                                    <input type="email" class="form-control" id="email" name="email" class="form-control form-control-lg" placeholder="Enter email" require>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="display_name">Username<span class="text-primary">*</span></label>
                                                                    <input type="text" class="form-control" id="display_name" name="display_name" class="form-control form-control-lg" placeholder="Enter username" require>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="mobile">Phone<span class="text-primary">*</span></label>
                                                                    <input type="text" class="form-control" id="mobile" name="mobile" class="form-control form-control-lg" placeholder="Enter username" require>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label" for="password">Password<span class="text-primary">*</span></label>
                                                                    <input type="password" class="form-control" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" require>
                                                                </div>

                                                                <div class="mb-3">
                                                                <label class="">Choose package<span class="text-primary">*</span></label>
                                         <select class="form-select form-select-lg mb-3" name="pack" class="form-control form-control-lg">

                                                                <?php 
                                                             	?>
                                                                     <option value="">-Select-</option>

                                                                        <?php foreach ($list_pack as $pa) : 
																		?>
                                                                            <option value="<?= $pa['id']; ?>"><?= $pa['title']; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>


                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" id="add">Add User</button>
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
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">remain broch</th>
                                                <th scope="col">expiration date</th>
												<th></th>
                                            </tr>
                                           </thead>
										   <tbody>
                                            <?php
		
        
                                    
                                            if (!empty($list_user)) {
                                                foreach ($list_user as $row) {
                                            ?>
                                                    <tr id="tr_<?php echo $row['user_id']; ?>">

                                                        <td><?php echo $row['user_id']; ?></td>
                                                        <td ><?php echo $row['display_name']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['mobile']; ?></td>
                                                        <td><?php echo $row['remain_broch']; ?></td>
                                                        <td><?php echo $row['expired_at'];?></td>


                                                        <td>
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">


                                                                    <a onclick="get_data('<?php echo $row['user_id']; ?>')" class="px-2 text-primary" data-bs-toggle="modal" data-bs-target="#edit_modal"><i class="uil uil-pen font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a onclick="del_pack('<?php echo $row['user_id']; ?>')" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                </li>


                                                            </ul>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            }
                                            ?>
                                     
                                        </tbody>
                                    </table>

                                    <form action="<?= base_url('admin/user/updateUser') ?>" method="post" id="formupdate">
                                        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="updateUser">
                                                        <!-- Add package Form -->

                                                    </div>

                                                    <!-- body -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="update">Update</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="<?= base_url('admin/user/delete') ?>" method="get" id="formdelete">
                                        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Package</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body" id="delete_pack">
                                                        <!-- Add package Form -->

                                                    </div>

                                                    <!-- body -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
		  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		
          <!-- Responsive examples -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
      
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
		
		
			 <!-- Required datatable js -->
      
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
                    url: "<?php echo base_url("admin/user/get_data"); ?>",
                    type: "POST",
                    cache: false,
                    data: {

                        id: id


                    },
                    success: function(dataResult) {
                        $("#updateUser").html(dataResult);

                    }

                });
            }

            function del_pack(id) {
                if (confirm("are you sure !")) {
                    $.ajax({
                        url: "<?php echo base_url("admin/user/delete"); ?>",
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