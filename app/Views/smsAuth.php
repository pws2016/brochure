<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Recover </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
      
        <link rel="shortcut icon" href="https://creazioneimpresa.net/wp-content/uploads/2020/06/favicon-black.png">
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
      
    </head>

    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5  pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div>
                            
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                
                            </a>
                            <div class="card">
                               
                                <div class="card-body p-4"> 
    
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary"></h5>
                                        <p class="text-muted"></p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <?php if(isset($error)){?>
                                            <div class="alert alert-danger text-center mb-4" role="alert">
                                           <?php echo $error?>
                                        </div>
                                    <?php }?>
                                        <div class="alert alert-success text-center mb-4" role="alert">
                                            Enter your 6 number  code !
                                        </div>
                                        <form action="<?= base_url('/smsAuth') ?>" method="post">
            
                                            <div class="mb-3">
                                                <label class="form-label" for="code">code</label>
                                                <input type="text" class="form-control" id="code" name="code" placeholder="Enter code">
                                            </div>
                                            
                                            <div class="mt-3 text-end">
                                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">login</button>
                                            </div>
                
    
                                            <div class="mt-4 text-center">
                                                <p class="mb-0"> <a href="auth-login.html" class="fw-medium text-primary"> Signin </a></p>
                                            </div>
                                        </form>
                                    </div>
                
                                </div>
                            </div>
                            <div class="mt-5 text-center">
                                <p>© <script>document.write(new Date().getFullYear())</script> Minible. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
  <!-- JAVASCRIPT -->
  <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <script src="<?php echo base_url()?>/Minible_v2.0.0/Admin/dist/assets/js/app.js"></script>
        <!-- JAVASCRIPT -->
       

      

    </body>
</html>
