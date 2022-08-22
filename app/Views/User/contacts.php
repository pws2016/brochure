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
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<style>
			h3.post__title.expand:before {width: 100px;}
			h3.post__title:before {content: "";width: 0;height: 10px;background-color: #FF7700;position: absolute;top: 0;transition: width 0.5s;}
		</style>
    </head>

    <!--body data-layout="horizontal" data-topbar="colored"-->
	<body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/headerUser.php')?>
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
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">
                                                            <i class="mdi mdi-plus me-2"></i> Add New </button>
                                                    </div>
                                                    <form action="<?= base_url('user/contacts/insert') ?>" method="post" id="form" enctype="multipart/form-data">
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">

                                                                        <h5 class="modal-title" id="exampleModalLabel"> Add Partners</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Add package Form -->

                                                                        <div class="form-group">
                                                                            <label for="">Name</label>
                                                                            <input type="text" id="name" name="name" class="form-control" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Email</label>
                                                                            <input type="email" id="email" name="email" class="form-control" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Phone</label>
                                                                            <input type="text" id="phone" name="phone" class="form-control" required>
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
                                                                            <label for="image" class="form-label">Choose image</label>
                                                                            <input class="form-control" type="file" name="image" id="image">
                                                                            
                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary" id="add">Add Partners</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-inline float-md-end mb-3">
                                                        <div class="search-box ms-2">
                                                            <div class="position-relative">
                                                                <input type="text" class="form-control rounded bg-light border-0" placeholder="Search...">
                                                                <i class="mdi mdi-magnify search-icon"></i>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                            <!-- end row -->

                                            <table class="table table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">
                                                            <div class="form-check font-size-16">
                                                                <input type="checkbox" class="form-check-input" id="contacusercheck">
                                                                <label class="form-check-label" for="contacusercheck"></label>
                                                            </div>
                                                        </th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Fax</th>
                                                        <th>Address</th>
                                                        <th>Image</th>
                                                    </tr>
                                                    <?php
                                                    if (!empty($cont)) {
                                                        foreach ($cont as $row) {
                                                    ?><tr id="tr_<?php echo $row['id']; ?>">
                                                                <td>
                                                                    <div class="form-check font-size-16">
                                                                        <input type="checkbox" class="form-check-input" id="contacusercheck1">
                                                                        <label class="form-check-label" for="contacusercheck1"></label>
                                                                    </div>
                                                                </td>
                                                                <td> <?php echo $row['user_id']; ?></td>

                                                                <td> <?php echo $row['name']; ?></td>

                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['phone']; ?></td>
                                                                <td><?php echo $row['fax']; ?></td>
                                                                <td><?php echo $row['address']; ?></td>
                                                                
                                                                <td>
                                                                
                                                                <img src="<?php echo base_url('uploads/contact_pic/'.$row['image'])?>"  height="50" width="50px"/> </td>

                                                                <td>
                                                                    <ul class="list-inline mb-0">




                                                                        <li class="list-inline-item">

                                                                            <a onclick="get_data('<?php echo $row['id']; ?>')" class="px-2 text-primary" data-toggle="modal" data-target="#edit_modal"><i class="uil uil-pen font-size-18"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a onclick="del_pack('<?php echo $row['id']; ?>')" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item dropdown">
                                                                            <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                                                <i class="uil uil-ellipsis-v"></i>
                                                                            </a>

                                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                                <a class="dropdown-item" href="#">Action</a>
                                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                                            </div>
                                                                        </li>
                                                                </td>
                                                                </ul>
                                                            </tr>
                                                    <?php }
                                                    }
                                                    ?>
                                                </thead>
                                                <tbody>








                                                    </td>
                                                    </tr>
                                                    <tr>
                                            </table>

                                            <form action="<?= base_url('user/contacts/update') ?>" method="post" id="form" enctype="multipart/form-data" >
                                                <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Partners</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body" id="edit_partners">
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



                                        </div>
                                    </div>
                                </div>

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

       <!-- jQuery first, then Popper.js, then Bootstrap JS -->
       <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
                                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                                <!-- Toastr -->
                                <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                                <!-- Font Awesome -->
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/js/all.min.js"></script>
                                <!-- DataTables -->
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
                                <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>


      <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
<script>
function get_client_profile(id){ 
	$.ajax({
				  url:"<?php echo base_url()?>/ajax/get_client_profile",
				  method:"POST",
				  data:{id:id}
				  
			}).done(function(data){
			
				$("#div_client_profile").html(data);
			});
}
	</script>
    </body>
</html>
