<!doctype html>
<html lang="it">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Lists</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
        <meta charset="utf-8" />
        <title><?php echo lang('app.title_page_dashboard')?> | <?/*php echo $settings['meta_title']*/?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="Creazioneimpresa" name="author" />
        <link rel="shortcut icon" href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/images/favicon.ico">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script src="https://kit.fontawesome.com/1c8067fc14.js" crossorigin="anonymous"></script>
       <style>
			h3.post__title.expand:before {width: 100px;}
			h3.post__title:before {content: "";width: 0;height: 10px;background-color: #FF7700;position: absolute;top: 0;transition: width 0.5s;}
		</style>
    </head>

    <!--body data-layout="horizontal" data-topbar="colored"-->
	<body data-sidebar="dark">
        <div id="layout-wrapper">
            <?php echo view('includes/header.php')?>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0"><?php echo lang('app.package')?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo lang('app.menu_crm')?></a></li>
                                            <li class="breadcrumb-item active"><?php echo lang('app.menu_dashboard')?></li> -->
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    
						 
					
                        </div>
                           <div class="row">
                            <div class="col-12">
                                <div class="card">
								
                                    <div class="card-body">
        <h4><?php echo lang('app.title_section_list-client')?></h4>
                                        <!--h4 class="card-title"><a data-bs-target="#add-modal-dialog"  data-bs-toggle="modal"  name="add" class="btn btn-success float-right"><?php echo  lang('app.btn_add')?></a></h4-->
                                       
                                
                                        <div class="container">
    <h3>Product Lists</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>display_name</th>
                    <th>mobile</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($user as $row):?>
                <tr>
                   <td><?= $row->id;?></td>
                    <td><?= $row->display_name;?></td>
                    <td><?= $row->mobile;?></td>
                    <td><?= $row->email;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id;?>" data-name="<?= $row->display_name;?>" data-mobile="<?= $row->mobile;?>" data-email="<?= $row->email;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    </div>
    
    <!-- Modal Add Product-->
    <form action="/product/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label></label>
                    <input type="text" class="form-control" name="display_name" placeholder=" Name">
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="mobile" placeholder="EMAIL">
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <select name="product_category" class="form-control">
                    <input type="text" class="form-control" name="mobile" placeholder="mobile">
                    </select>
                </div>
            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->

    <!-- Modal Edit Product-->
    <form action="/product/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control display_name" name="display_name" placeholder=" Name">
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="mobile" placeholder="EMAIL">
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <select name="product_category" class="form-control">
                    <input type="text" class="form-control" name="mobile" placeholder="mobile">
                    </select>
                </div>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->

    <!-- Modal Delete Product-->
    <form action="/product/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
               <h4>Are you sure want to delete this product?</h4>
            
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" class="userID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){

        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const price = $(this).data('email');
            const category = $(this).data('mobile');
            // Set data to Form Edit
            $('.id').val(id);
            $('.display_name').val(name);
            $('.mobile').val(email);
            $('.mobile').val(mobile);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.userID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
        
    });
</script>
       
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                               <?php echo view('includes/copyright');?>
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
     
     <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
       <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

      

        

      <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
     

<script>




	</script>
    </body>
</html>
