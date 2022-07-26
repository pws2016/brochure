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
	 <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                                        <h4 class="mb-0">Elenco Brochures</h4>
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"></li>
                                                <li class="breadcrumb-item active">Elenco Brochures</li>
                                            </ol>
                                        </div>

                                    </div>
                                </div>
								<div class="col-12">
									<p>Elenco di tutte le brochure.  Clicca su <b>+ Agg. Nuovo</b> per creare una nuova Brochure.</p>
								</div>
                            </div>
                            <!-- end page title -->


                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
										<?php if(session()->has('error')){?>
										<div class="alert alert-danger"><?php echo session()->getFlashdata('error')?></div>
										<?php } ?>
										<?php if(isset($errorPack)){?>
										<div class="alert alert-danger"><?php echo $errorPack?></div>
										<?php } ?>
                                            <div class="row mb-2">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <a  class="btn btn-success waves-effect waves-light" href="<?php echo base_url('user/brochures/new')?>">
                                                            <i class="mdi mdi-plus me-2"></i> <?php echo lang('app.btn_add') ?> </a>
                                                    </div>
                                                   
                                                </div>

                                         

                                            </div>


                                            <!-- end row -->

                                         <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">
                                                           
                                                        </th>
                                                        <th>ID</th>
                                                        <th>Titole</th>
                                                        <th>Categoria</th>
                                                        <th>Creato il</th>
                                                        <th>Modicato il</th>
                                                        <th>Status</th>
                                                       
                                                    </tr>
												</thead>
												  <tbody>
                                                    <?php
                                                    if (!empty($list)) {
                                                        foreach ($list as $row) {
                                                    ?><tr id="tr_<?php echo $row['id']; ?>">
                                                                <td>
                                                                    <ul class="list-inline mb-0">


<?php
                                                                    if($row['status']=="draft" && !isset($errorPack)){  ?>

                                                                        <li class="list-inline-item">

                                                                            <a href="<?php echo base_url('user/brochures/edit/'.$row['id'] )?>" class="px-2 text-primary" ><i class="uil uil-pen font-size-18"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                        <a onclick="del_pack('<?php echo $row['id']; ?>')" class="px-2 text-danger"><i class="uil uil-trash-alt font-size-18"></i></a>
                                                                        </li>

                                                                        <li class="list-inline-item">
                                                                    <a class="px-2 text-info" data-bs-target="#duplicate-modal-dialog" data-bs-toggle="modal" onclick="duplicate_broch('<?php echo $row['id'] ?>')" href=""><i class="uil uil-file-copy-alt font-size-18"></i></a>
                                                                        
                                                                                                                                                                                                                        
                                                                </li>

                                                                        <?php }?>
																		 </ul>
                                                                </td>
                                                                <td> <?php echo $row['id']; ?></td>

                                                                <td> <?php echo $row['title']; ?></td>
                                                                <td> <?php echo $row['catname']; ?></td>
                                                                <td> <?php echo $row['created_at']; ?></td>
                                                                <td> <?php echo $row['updated_at']; ?></td>


                                                                <td><?php echo $row['status']; ?></td>
                                                              
                                                               
                                                               
                                                            </tr>
                                                    <?php }
                                                    }
                                                    ?>
                                              
                                                </tbody>

                                            </table>

                                            <form action="<?= base_url('user/contacts/update') ?>" method="post" id="form" enctype="multipart/form-data" >
                                                <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modifica partner</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body" id="edit_partners">
                                                                <!-- Add package Form -->

                                                            </div>

                                                            <!-- body -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                                                <button type="submit" class="btn btn-primary" id="update">Aggiorna</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <?php $attributes = ['class' => 'form-input-flat', 'id' => 'myform', 'method' => 'post'];
                                    echo form_open(base_url('user/brochures/duplication'), $attributes); ?>
                                    <input type="hidden" name="action" value="duplicate">
                                    <input type="hidden" name="id" id="id_duplicate">
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
                                                    <div class="alert alert-warning"><label><?php echo lang('app.alert_duplicate_item2') ?></label></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo lang('app.btn_cancel') ?></button>
                                                    <input type="submit" name="delete" class="btn btn-danger" value="<?php echo lang('app.btn_save') ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>


                                        </div>
                                    </div>
                                </div>
					<div class="col-12">
						<h5>Info</h5>
						<p><i class="uil uil-pen font-size-18 text-primary"></i> Strumento di modifica<br>
							<i class="uil uil-trash-alt font-size-18 text-danger"></i> Strumento di cancellazione<br>
							<i class="uil uil-file-copy-alt font-size-18 text-info"></i> Permette di duplicare la righa</p>
					</div>
				</div>

                                <!-- Optional JavaScript -->
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
                              <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
		
          <!-- Responsive examples -->
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
		<script>
$("#datatable").DataTable({
		language: {
				url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Italian.json'
			},
			searching: true
			
			});

</script>
                             
                                <script>
                                    function get_data(id) {
                                        $.ajax({
                                            url: "<?php echo base_url("user/contacts/get_data"); ?>",
                                            type: "POST",
                                            cache: false,
                                            data: {

                                                id: id


                                            },
                                            success: function(dataResult) {
                                                $("#edit_partners").html(dataResult);

                                            }

                                        });
                                    }





                                    function del_pack(id) {
                                        if (confirm("are you sure !")) {
                                            $.ajax({
                                                url: "<?php echo base_url("user/brochures/delete"); ?>",
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
                                    function duplicate_broch(v){
                                        $("#id_duplicate").val(v);
                                    }
                                </script>
								  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
</body>

</html>