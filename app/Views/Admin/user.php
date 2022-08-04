<!doctype html>
<html lang="it">
    <head>
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
                                       
                                
<div class="col-md-12 text-end py-2">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Add New Client
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
<form class="" action="" method="">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="firstname">First Name</label>
               <input type="text" class="form-control" name="firstname" id="name" value="<?= set_value('name') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="firstname">Phone</label>
               <input type="text" class="form-control" name="phone" id="phone" value="<?= set_value('phone') ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
               <label for="email">Email address</label>
               <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control" name="password" id="pass" value="">
             </div>
           </div>
           <div class="col-12 col-sm-6">
             <div class="form-group">
              <label for="confirmpass">Confirm Password</label>
              <input type="password" class="form-control" name="pass" id="confirmpass" value="">
            </div>
          </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 col-sm-4"><br>
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="col-12 col-sm-8 text-right"><br>
              <a href="/login">Already have an account</a>
            </div>
          </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
 
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
         
            <thead>
                <tr class="bg-dark bg-gradient text-light">
                  
                   
                    <th>Client ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Sattus</th>
         
                </tr>
          
            <?php
             use App\Models\UserModel;

             $users = new UserModel();
             $listclient ['users']= $users->findAll();
        



  foreach($users as $row): ?>
  
     
        <tr> 
      <td class="py-1 px-2"> <?=isset ($row['id'] )?></td>
      <td class="py-1 px-2"><?= isset ($row['display_name'])  ?></td>
      <td class="py-1 px-2"><?= isset ($row['email'])  ?></td>
      <td class="py-1 px-2"><?= isset ($row['mobile'] )?></td>
      <td class="py-1 px-2"><?= isset ($row['active'] ) ?></td> 

      <td class="py-1 px-2 text-center">
         <!-- <button type="button" class='bi bi-trash' style='color: red'></span></button> -->
              
              <span class='bi bi-trash' style='color: red'></span>
              <!-- <button type="button" class='bi bi-pencil' style='color:#f35f39'></span></button> -->
           <span class='bi bi-pencil' style='color:#f35f39'></span>
      </td>

      </tr>     
<?php endforeach; ?>
           
              
           
        </table>
    </div>
</div>

                                        
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
       
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
